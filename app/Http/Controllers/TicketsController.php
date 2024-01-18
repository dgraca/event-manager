<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketsRequest;
use App\Http\Requests\UpdateTicketsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the Tickets.
     */
    public function index(Request $request)
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new Tickets.
     */
    public function create()
    {
        $tickets = new Tickets();
        $tickets->loadDefaultValues();
        return view('tickets.create', compact('tickets'));
    }

    /**
     * Store a newly created Tickets in storage.
     */
    public function store(CreateTicketsRequest $request)
    {
        $input = $request->all();

        /** @var Tickets $tickets */
        $tickets = Tickets::create($input);
        if($tickets){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('tickets.index'));
    }

    /**
     * Display the specified Tickets.
     */
    public function show($id)
    {
        /** @var Tickets $tickets */
        $tickets = Tickets::find($id);

        if (empty($tickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        return view('tickets.show')->with('tickets', $tickets);
    }

    /**
     * Show the form for editing the specified Tickets.
     */
    public function edit($id)
    {
        /** @var Tickets $tickets */
        $tickets = Tickets::find($id);

        if (empty($tickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        return view('tickets.edit')->with('tickets', $tickets);
    }

    /**
     * Update the specified Tickets in storage.
     */
    public function update($id, UpdateTicketsRequest $request)
    {
        /** @var Tickets $tickets */
        $tickets = Tickets::find($id);

        if (empty($tickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        $tickets->fill($request->all());
        if($tickets->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified Tickets from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Tickets $tickets */
        $tickets = Tickets::find($id);

        if (empty($tickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        if($tickets->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('tickets.index'));
    }
}
