<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessTicketRequest;
use App\Http\Requests\UpdateAccessTicketRequest;
use App\Models\AccessTicket;
use App\Models\Event;
use App\Models\EventSessionTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                        $accessTickets[] = $this->create($eventSessionTicketId, $request, $quantity, $eventSessionTicket);
                    } else {
                        throw new \Exception(__("Ticket limit exceeded"));
                    }
                }
            }

            // Save all access tickets
            foreach ($accessTickets as $accessTicket) {
                $accessTicket->save();
            }

            $eventSessionTicket->save();

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();

            flash($e->getMessage())->danger();

            // return back with error message
            return back();
        }

        // TODO: Gerar PDF com os bilhetes e com o respetivo QR Code
        // TODO: Enviar email com os bilhetes
        /**
         * TODO: Repensar na forma como os bilhetes  (accessTickets) são guardados na DB.
         * Não faz sentido existir um campo "tickets_count". Porquê? Porque um accessTicket pode ter vários tickets.
         * E são um QR code está associado a um e um só ticket. Logo, esse tickets_count deverá ser substituído por um "used"
         * Que será um smallint. Se o bilhete for de uso único, será 1. Se for de vários usos, será o número de usos.
         * Fará também sentido ter um campo para descrição? Vamos supor que eu compro um bilhete para mim e para mais 4 amigos.
         * Seriam 4 campos de descrição ou apenas 1? Estou a demais? Será que faz sentido ter um campo de descrição?
         * Depois esses campos têm que ser visíveis no PDF e também para o manager do evento.
         */

        return redirect(route('access-tickets.thank_you'));
    }

    /**
     * Create a new AccessTicket
     */
    public function create($id, $request, $quantity, $eventSessionTicket)
    {
        $accessCode = uuid_create();

        $accessTicket = new AccessTicket();
        $accessTicket->event_session_ticket_id = $id;
        $accessTicket->name = $request->name;
        $accessTicket->email = $request->email;
        $accessTicket->phone = $request->phone ?? null;
        $accessTicket->description = $request->description ?? null;
        $accessTicket->tickets_count = $quantity;
        $accessTicket->code = $accessCode;
        $accessTicket->approved = $request->approved ?? false;

        $eventSessionTicket->count += $quantity;

        return $accessTicket;
    }

    /**
     * Show the thank-you page
     */
    public function showThankYou()
    {
        return view('event.thank_you_public');
    }
}
