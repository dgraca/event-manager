<?php

namespace App\Http\Controllers;

use App\Models\AccessTicket;
use App\Models\Event;
use App\Models\EventSessionTicket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Check which button was clicked
        $paymentMethod = $request->input('payment_method');

        // This transaction will ensure that all the tickets are saved or none
        // ensuring that the user will not be charged for tickets that are not available
        DB::beginTransaction();

        try {
            // Get event
            $event = Event::find($request->event_id);

            $request->merge([
                'payment_method' => $paymentMethod,
            ]);

            // Create a new Transaction
            $transaction = new Transaction();
            $transaction->approved = $request->approved ?? false;
            $transaction->paid = false;
            // Store the payment method to be read by the Scheduled tasks
            $transaction->payment_method = $request->payment_method;
            $transaction->event_id = $event->id;

            // Save the transaction
            $transaction->save();

            // Validate if the tickets are available
            $validationResult = $this->validateTicketsAvailability($request, $transaction);

            // If the tickets are not available, throw an exception
            if (!$validationResult['availability']) {
                throw new \Exception(__("Limit is exceeded"));
            }

            // If the max capacity (for some session) is reached, throw an exception
            if ($validationResult['maxCapacityReached']['status']) {
                throw new \Exception(__("Max capacity reached for session :session", ['session' => $validationResult['maxCapacityReached']['session']->ticket->name]));
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
         * 3 ways to pay:
         * 1. free tickets don't require payment, just generate the PDFs and send them to the user
         * 2. bank transfer - redirects to the page with the bank details
         * 3. PayPal - redirects to the PayPal page
         */
        // If the total isn't 0 - which means it needs to be paid - redirect to the payment page: whether bank transfer or PayPal or future payment methods
        if ($validationResult['total'] != 0) {
            $paymentOption = $event->entity->paymentOptions->first();
            // If the payment method is bank transfer, redirect to the bank transfer page
            if ($paymentMethod == 'bank_transfer' && isset(json_decode($paymentOption->data)->bank_transfer)) {
                return redirect(route('access-tickets.thank_you', [
                    'payment_info' => json_decode($paymentOption->data)->bank_transfer,
                    'email' => $paymentOption->email,
                    'total' => $validationResult['total'],
                    'currency' => $validationResult['currency'],
                ]));
            }

            // If the payment method is PayPal, redirect to the PayPal page
            if ($paymentMethod == 'paypal') {
                $res = $this->payWithPaypal([
                    'slug' => $event->slug,
                    'total' => $validationResult['total'],
                    'currency' => $validationResult['currency'],
                    'transaction_id' => $transaction->id,
                ]);

                return redirect()->away($res);
            }
        }

        // The total is 0, which means the tickets are free and the user doesn't need to pay
        // So we need to save each ticket with the "paid" flag as true by default
        $transaction->paid = true;
        $transaction->payment_method = "free";
        $transaction->save();

        // If the total is 0, no need to pay. The tickets should be generated as soon as the "payment" is "verified" by the cron jobs
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
    private function validateTicketsAvailability(Request $request, $transaction) {
        $accessTickets = [];
        $eventSessionTickets = [];

        $availability = true;
        $total = 0;
        $currency = 'EUR';
        $maxCapacityReached = false;

        foreach ($request->tickets as $eventSessionTicketId => $quantity) {
            $quantity = (int) $quantity;
            if ($quantity > 0) {
                $eventSessionTicket = EventSessionTicket::find($eventSessionTicketId);
                $eventSessionTickets[] = $eventSessionTicket;

                // Get ticket from the EventSessionTicket
                $ticket = $eventSessionTicket->ticket;
                $total += $ticket->price * $quantity;

                $currency = $ticket->currency;

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

                // Check if this session has max capacity and if it is reached
                if ($eventSessionTicket->eventSession->max_capacity > 0 && $eventSessionTicket->eventSession->max_capacity < $quantity - $eventSessionTicket->count) {
                    $maxCapacityReached = true;
                    $maxCapacityReachedSession = $eventSessionTicket;
                    break;
                }

                // Check if there is a limit for this eventSessionTicket (0 is unlimited) and if there is a limit, checks if it is not exceeded
                if ($eventSessionTicket->limit == 0 || ($eventSessionTicket->limit > 0 && $eventSessionTicket->limit >= $eventSessionTicket->count + $quantity)) {
                    $accessTickets = array_merge($accessTickets, $this->create($eventSessionTicketId, $request, $quantity, $eventSessionTicket, $transaction));
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
            'maxCapacityReached' => [
                'status' => $maxCapacityReached,
                'session' => $maxCapacityReachedSession ?? null,
            ],
        ];
    }

    /**
     * Create a new AccessTicket
     */
    private function create($id, $request, $quantity, $eventSessionTicket, $transaction)
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
            $accessTickets[] = $accessTicket;

            // Associate the access ticket with the transaction
            $accessTicket->transaction_id = $transaction->id;

            $eventSessionTicket->increment('count');
        }

        return $accessTickets;
    }

    /**
     * Show the thank-you page
     */
    public function showThankYou(Request $request)
    {
        return view('event.thank_you_public', $request->all());
    }

    /**
     * Validate the ticket
     */
    public function validateAccessTicket(Request $request) {
        // Checks if the auth user can validate tickets for this event
        $userEvents = auth()->user()->entities()->first()->events;

        // Get the access ticket by the code
        $accessTicket = AccessTicket::where('code', $request->code)->first();

        // Checks if the access ticket exists
        if ($accessTicket == null ) {
            $result = 'invalid';
        } else {
            // Checks if the user can validate tickets for this event and store the event in $event;
            $event = null;
            foreach ($userEvents as $userEvent) {
                if ($userEvent->id == $accessTicket->eventSessionTicket->ticket->event->id) {
                    $event = $userEvent;
                    break;
                }
            }

            if ($event == null || $accessTicket->eventSessionTicket->ticket->event->id != $event->id) {
                $result = 'invalid';
            } elseif ($event->pre_approval && !$accessTicket->transaction->approved) {
                $result = 'invalid';
            } elseif (!$accessTicket->transaction->paid) {
                $result = 'invalid';
            } elseif ($accessTicket->tickets_count > 0) {
                $accessTicket->tickets_count--;
                $accessTicket->save();
                $result = 'valid';
            } else {
                $result = 'invalid';
            }
        }

        return view('access_tickets.result', compact('result'));
    }
}
