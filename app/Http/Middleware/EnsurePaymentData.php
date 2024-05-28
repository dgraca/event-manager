<?php

namespace App\Http\Middleware;

use App\Models\PaymentOption;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePaymentData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensures the user has a name (kind of what the EnsureProfileName middleware does...)
        if (auth()->user()->name != '') {
            // Check if the current route is payment-options.edit
            if ($request->route()->getName() === 'payment-options.edit') {
                return $next($request); // Allow the request to proceed
            }

            // Retrieve the user's payment option
            $paymentOption = PaymentOption::where('entity_id', $request->user()->entities->first()->id)->first();

            // If payment option is not found or incomplete, redirect to payment options edit page
            if (!$paymentOption || !$this->isPaymentDataComplete($paymentOption)) {
                flash(__('Please fill in your payment data.'))->overlay()->warning();
                return redirect()->route('payment-options.edit', $paymentOption->id);
            }
        }

        // If payment data is complete, allow the request to proceed
        return $next($request);
    }

    /**
     * Check if payment data is complete.
     *
     * @param  \App\Models\PaymentOption  $paymentOption
     * @return bool
     */
    private function isPaymentDataComplete($paymentOption)
    {
        return !empty($paymentOption->vat)
            && !empty($paymentOption->address)
            && !empty($paymentOption->location)
            && !empty($paymentOption->postcode)
            && !empty($paymentOption->email);
    }
}
