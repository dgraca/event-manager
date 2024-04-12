<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessTicketRequest;
use App\Http\Requests\UpdateAccessTicketRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\AccessTicket;
use Illuminate\Http\Request;

class AccessTicketController extends Controller
{
    /**
     * Store a newly created AccessTickets in storage.
     */
    public function store(Request $request)
    {
        /**
         * Validate the request
         * Name must be required with a minimum of 3 characters and a maximum of 255 characters
         * Email must be required and must be a valid email address
         * Phone must be required (validation should be done via intl-tel-input package in the frontend)
         * Tickets must be required and must be an array
         * Tickets must contain at least one ticket selected
         * Tickets must not contain negative values
         */
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'tickets' => ['required', 'array', function ($attribute, $value, $fail) {
                // Check if any ticket has a value greater than 0
                if (!collect($value)->contains(function ($ticket) {
                    return $ticket > 0;
                })) {
                    $fail(__('validation.custom.at_least_one_ticket_selected', ['attribute' => $attribute]));
                }

                // Check if any ticket has a negative value
                if (collect($value)->contains(function ($ticket) {
                    return $ticket < 0;
                })) {
                    $fail(__('validation.custom.no_negative_values_allowed', ['attribute' => $attribute]));
                }
            }],
        ]);

        return $request->all();
    }
}
