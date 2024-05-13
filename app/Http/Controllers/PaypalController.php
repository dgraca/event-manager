<?php

namespace App\Http\Controllers;

use App\Models\AccessTicket;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

/**
 * Class PaypalController
 *
 * Responsible to handle all the PayPal payment related operations
 *
 * @package App\Http\Controllers
 */
class PaypalController extends Controller
{

    /**
     * Redirect the user to the PayPal payment page
     *
     * return void
     */
    public static function createOrder($data) {
        // Create a new instance of PayPalClient
        $provider = new PayPalClient();

        // Set the API credentials from the config file
        $provider->setApiCredentials(config('paypal'));

        // Get the access token from PayPal that is required to make any API calls
        $provider->getAccessToken();

        // Set the order payload
        $payload = [
            'intent' => 'CAPTURE',
            "application_context" => [
                "return_url" => route('success', $data),
                "cancel_url" => route('events.show_public', $data['slug'])
            ],
            'purchase_units' => [
                0 => [
                    'amount' => [
                        'currency_code' => $data['currency'] ?? 'EUR',
                        'value' => $data['total'],
                    ]
                ]
            ]
        ];

        // Create a new order to be sent to PayPal
        $response = $provider->createOrder($payload);

        // If the order is created successfully, redirect the user to the PayPal payment page
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        // If the order creation fails, redirect the user to the cancel page
        flash(__('Payment failed'))->danger();
        return back();
    }

    public function success(Request $request) {
        // Create a new instance of PayPalClient
        $provider = new PayPalClient();

        // Set the API credentials from the config file
        $provider->setApiCredentials(config('paypal'));

        // Get the access token from PayPal that is required to make any API calls
        $provider->getAccessToken();

        // Capture the order (this is where the payment is actually made)
        $reponse = $provider->capturePaymentOrder($request->token);

        // If payment is successful return the success message
        if (isset($reponse['status']) && $reponse['status'] == 'COMPLETED') {
            // Set the tickets as paid
            $this->setTicketAsPaid($request->accessTickets);
            return redirect()->route('access-tickets.thank_you');
        }

        flash(__('Payment failed'))->danger();

        // If payment fails, return the error message
        return back();
    }

    private function setTicketAsPaid($tickets) {
        // Set the ticket as paid
        foreach ($tickets as $ticket) {
            // Get ticket by ID
            $ticket = AccessTicket::find($ticket);
            $ticket->paid = true;
            $ticket->save();
        }
    }
}
