<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentOptionsRequest;
use App\Http\Requests\UpdatePaymentOptionsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\PaymentOption;
use Illuminate\Http\Request;

class PaymentOptionsController extends Controller
{
    /**
     * Display a listing of the PaymentOptions.
     */
    public function index(Request $request)
    {
        return view('payment_options.index');
    }

    /**
     * Show the form for creating a new PaymentOptions.
     */
    public function create()
    {
        $paymentOptions = new PaymentOption();
        $paymentOptions->loadDefaultValues();
        return view('payment_options.create', compact('paymentOptions'));
    }

    /**
     * Store a newly created PaymentOptions in storage.
     */
    public function store(CreatePaymentOptionsRequest $request)
    {
        $input = $request->all();

        /** @var PaymentOption $paymentOptions */
        $paymentOptions = PaymentOption::create($input);
        if($paymentOptions){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('payment-options.index'));
    }

    /**
     * Display the specified PaymentOptions.
     */
    public function show($id)
    {
        /** @var PaymentOption $paymentOptions */
        $paymentOptions = PaymentOption::find($id);

        if (empty($paymentOptions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        return view('payment_options.show')->with('paymentOptions', $paymentOptions);
    }

    /**
     * Show the form for editing the specified PaymentOptions.
     */
    public function edit($id)
    {
        /** @var PaymentOption $paymentOptions */
        $paymentOptions = PaymentOption::find($id);

        if (empty($paymentOptions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        return view('payment_options.edit')->with('paymentOptions', $paymentOptions);
    }

    /**
     * Update the specified PaymentOptions in storage.
     */
    public function update($id, UpdatePaymentOptionsRequest $request)
    {
        /** @var PaymentOption $paymentOptions */
        $paymentOptions = PaymentOption::find($id);

        if (empty($paymentOptions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        $paymentOptions->fill($request->all());
        if($paymentOptions->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('payment-options.index'));
    }

    /**
     * Remove the specified PaymentOptions from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var PaymentOption $paymentOptions */
        $paymentOptions = PaymentOption::find($id);

        if (empty($paymentOptions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        if($paymentOptions->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('payment-options.index'));
    }
}
