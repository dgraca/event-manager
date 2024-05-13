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
use Illuminate\Support\Facades\Session;

class AccessTicketController extends Controller
{
    /**
     * Store all the access tickets purchased
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'tickets' => ['required', 'array', function ($attribute, $value, $fail) {
                // Validates if at least one ticket is selected
                if (!collect($value)->contains(function ($ticket) {
                    return $ticket > 0;
                })) {
                    $fail(__('validation.custom.at_least_one_ticket_selected', ['attribute' => $attribute]));
                }

                // Validates if there are no negative values
                if (collect($value)->contains(function ($ticket) {
                    return $ticket < 0;
                })) {
                    $fail(__('validation.custom.no_negative_values_allowed', ['attribute' => $attribute]));
                }
            }],
        ]);

        // This transaction will ensure that all the tickets are saved or none
        // ensuring that the user will not be charged for tickets that are not available
        DB::beginTransaction();

        try {
            // Get event
            $event = Event::find($request->event_id);

            // Validate if the tickets are available
            $validationResult = $this->validateTicketsAvailability($request, $event);

            // If the tickets are not available, throw an exception
            if (!$validationResult['availability']) {
                throw new \Exception(__("Limit is exceeded"));
            }

            // Save all access tickets
            foreach ($validationResult['accessTickets'] as $accessTicket) {
                $accessTicket->save();
            }

            // Commit the transaction
            DB::commit();

        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();

            flash($e->getMessage())->danger();

            // return back with error message
            return redirect(route('events.show_public', $event->slug));
        }

        /**
         * TODO: After the payment is verified, the PDFs should be generated
         * TODO: If the tickets were paid with PayPal, and the payment failed, the tickets should be released (maybe with a cron job)
         * TODO: Let the user choose if they wanna pay with paypal or via bank transfer
         * TODO: If the user chooses bank transfer, the tickets should be sent after the payment is verified (maybe with a cron job)
         */

        // If the total is greater than 0, pay with PayPal
        if ($validationResult['total'] > 0) {
            $res = $this->payWithPaypal([
                'slug' => $event->slug,
                'total' => $validationResult['total'],
                'currency' => $validationResult['currency'],
                'accessTickets' => array_map(function($accessTicket) {
                    return $accessTicket['id'];
                }, $validationResult['accessTickets']),
                'eventSessionTickets' => array_map(function($eventSessionTicket) {
                    return $eventSessionTicket['id'];
                }, $validationResult['eventSessionTickets']),
            ]);

            return redirect()->away($res);
        }

        /**
         * If the total is 0, generate the PDFs and send them to the user
         * Dispatch job for generating PDFs asynchronously
         */
        GenerateAccessTicketPDF::dispatch($event, $validationResult['eventSessionTickets'], $validationResult['accessTickets']);
        return redirect(route('access-tickets.thank_you'));
    }

    /**
     * Pay with PayPal - this is my approach to call the PayPal controller. Why?
     *
     * Because the PayPal portal should be requested via POST, and I can't do that with a simple redirect.
     * Okay, but why not just perform a POST request to the PayPal controller in the view?
     * Because I want to validate first if the tickets are available, and if they are I want to "secure" them to the user.
     * If the user fails to pay, the tickets should be released. This is kind of a "booking" mechanism, but spaghettified.
     *
     * @param $data
     * @return string
     */
    private function payWithPaypal($data) {
        // Call the static method of PayPal controller
        $res = PaypalController::createOrder($data);
        return $res->getTargetUrl();
    }

    /**
     * Validate if the tickets are available
     */
    private function validateTicketsAvailability(Request $request, $event) {

        // TODO: this should be done in the createOrder method
        if ($event->pre_approval) {
            $request->merge(['approved' => true]);
        }

        $accessTickets = [];
        $eventSessionTickets = [];

        $availability = true;
        $total = 0;
        $currency = 'EUR';

        foreach ($request->tickets as $eventSessionTicketId => $quantity) {
            $quantity = (int) $quantity;
            if ($quantity > 0) {
                $eventSessionTicket = EventSessionTicket::find($eventSessionTicketId);
                $eventSessionTickets[] = $eventSessionTicket;

                // Get the session of the ticket
                $eventSession = $eventSessionTicket->ticket;
                $total += $eventSession->price * $quantity;

                $currency = $eventSession->currency;

                // Check how many tickets this email has already bought for this specific eventSession
                $accessTicketsCount = AccessTicket::where('email', $request->email)
                    ->whereHas('eventSessionTicket', function ($query) use ($eventSessionTicket) {
                        $query->where('event_session_id', $eventSessionTicket->id);
                    })
                    ->count();

                // Check if the limit is exceeded
                if ($eventSessionTicket->limit > 0 && $accessTicketsCount >= $eventSessionTicket->limit) {
                    $availability = false;
                    break;
                }

                // Check if there is a limit for this eventSessionTicket (0 is unlimited) and if there is a limit, checks if it is not exceeded
                if ($eventSessionTicket->limit == 0 || ($eventSessionTicket->limit > 0 && $eventSessionTicket->limit >= $eventSessionTicket->count + $quantity)) {
                    $accessTickets = array_merge($accessTickets, $this->create($eventSessionTicketId, $request, $quantity, $eventSessionTicket));
                } else {
                    $availability = false;
                    break;
                }
            }
        }

        return [
            'availability' => $availability,
            'eventSessionTickets' => $eventSessionTickets,
            'accessTickets' => $accessTickets,
            'total' => $total,
            'currency' => $currency,
        ];
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
