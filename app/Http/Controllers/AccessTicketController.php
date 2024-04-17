<?php

namespace App\Http\Controllers;

use App\Helpers\Word2Pdf;
use App\Jobs\GenerateAccessTicketPDF;
use App\Models\AccessTicket;
use App\Models\Event;
use App\Models\EventSessionTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AccessTicketController extends Controller
{
    /**
     * Store a newly created AccessTickets in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'tickets' => ['required', 'array', function ($attribute, $value, $fail) {
                if (!collect($value)->contains(function ($ticket) {
                    return $ticket > 0;
                })) {
                    $fail(__('validation.custom.at_least_one_ticket_selected', ['attribute' => $attribute]));
                }

                if (collect($value)->contains(function ($ticket) {
                    return $ticket < 0;
                })) {
                    $fail(__('validation.custom.no_negative_values_allowed', ['attribute' => $attribute]));
                }
            }],
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Get event
            $event = Event::find($request->event_id);
            if ($event->pre_approval) {
                $request->merge(['approved' => true]);
            }

            $accessTickets = [];

            foreach ($request->tickets as $eventSessionTicketId => $quantity) {
                $quantity = (int) $quantity;
                if ($quantity > 0) {
                    $eventSessionTicket = EventSessionTicket::find($eventSessionTicketId);
                    if ($eventSessionTicket->limit == 0 || ($eventSessionTicket->limit > 0 && $eventSessionTicket->limit >= $eventSessionTicket->count + $quantity)) {
                        $accessTickets = array_merge($accessTickets, $this->create($eventSessionTicketId, $request, $quantity, $eventSessionTicket));
                    } else {
                        throw new \Exception(__("Ticket limit exceeded"));
                    }
                }
            }

            // Save all access tickets
            foreach ($accessTickets as $accessTicket) {
                $accessTicket->save();
            }

            // Commit the transaction
            DB::commit();

            // Dispatch job for generating PDFs asynchronously
            GenerateAccessTicketPDF::dispatch($accessTickets);

        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();

            flash($e->getMessage())->danger();

            // return back with error message
            return back();
        }

        return redirect(route('access-tickets.thank_you'));
    }

    /**
     * Create a new AccessTicket
     */
    private function create($id, $request, $quantity, $eventSessionTicket)
    {
        $accessTickets = [];
        // for i in quantity create a new access ticket
        for ($i = 0; $i < $quantity; $i++) {
            $accessTicket = new AccessTicket();
            $accessTicket->event_session_ticket_id = $id;
            $accessTicket->name = $request->name;
            $accessTicket->email = $request->email;
            $accessTicket->phone = $request->phone ?? null;
            $accessTicket->description = $request->description ?? null;
            $accessTicket->tickets_count = $eventSessionTicket->ticket->max_check_in;
            $accessTicket->code = uuid_create();
            $accessTicket->approved = $request->approved ?? false;
            $accessTickets[] = $accessTicket;

            $eventSessionTicket->increment('count');
        }

        return $accessTickets;
    }

    /**
     * Show the thank-you page
     */
    public function showThankYou()
    {
        return view('event.thank_you_public');
    }
}
