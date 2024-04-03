<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentOptionsRequest;
use App\Http\Requests\UpdatePaymentOptionRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\PaymentOption;
use Illuminate\Http\Request;

class PaymentOptionController extends Controller
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
        $paymentOption = new PaymentOption();
        $paymentOption->loadDefaultValues();
        return view('payment_options.create', compact('paymentOption'));
    }

    /**
     * Store a newly created PaymentOptions in storage.
     */
    public function store(CreatePaymentOptionsRequest $request)
    {
        $input = $request->all();

        /** @var PaymentOption $paymentOption */
        $paymentOption = PaymentOption::create($input);
        if($paymentOption){
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
        /** @var PaymentOption $paymentOption */
        $paymentOption = PaymentOption::find($id);

        if (empty($paymentOption)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        return view('payment_options.show')->with('paymentOption', $paymentOption);
    }

    /**
     * Show the form for editing the specified PaymentOptions.
     */
    public function edit($id)
    {
        /** @var PaymentOption $paymentOption */
        $paymentOption = PaymentOption::find($id);

        if (empty($paymentOption)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        return view('payment_options.edit')->with('paymentOption', $paymentOption);
    }

    /**
     * Update the specified PaymentOptions in storage.
     */
    public function update($id, UpdatePaymentOptionRequest $request)
    {
        /** @var PaymentOption $paymentOption */
        $paymentOption = PaymentOption::find($id);

        if (empty($paymentOption)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        $paymentOption->fill($request->all());
        if($paymentOption->save()){
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
        /** @var PaymentOption $paymentOption */
        $paymentOption = PaymentOption::find($id);

        if (empty($paymentOption)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('payment-options.index'));
        }

        if($paymentOption->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('payment-options.index'));
    }
}
