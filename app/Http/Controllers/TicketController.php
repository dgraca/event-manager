<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        $ticket = new Ticket();
        $ticket->loadDefaultValues();
        return view('tickets.create', compact('ticket'));
    }

    /**
     * Store a newly created Tickets in storage.
     */
    public function store(CreateTicketRequest $request)
    {
        $input = $request->all();

        /** @var Ticket $ticket */
        $ticket = Ticket::create($input);
        if($ticket){
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
        /** @var Ticket $ticket */
        $ticket = Ticket::find($id);

        if (empty($ticket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        return view('tickets.show')->with('tickets', $ticket);
    }

    /**
     * Show the form for editing the specified Tickets.
     */
    public function edit($id)
    {
        /** @var Ticket $ticket */
        $ticket = Ticket::find($id);

        if (empty($ticket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        return view('tickets.edit')->with('ticket', $ticket);
    }

    /**
     * Update the specified Tickets in storage.
     */
    public function update($id, UpdateTicketRequest $request)
    {
        /** @var Ticket $ticket */
        $ticket = Ticket::find($id);

        if (empty($ticket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }
        $ticket->fill($request->all());
        if($ticket->save()){
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
        /** @var Ticket $ticket */
        $ticket = Ticket::find($id);

        if (empty($ticket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('tickets.index'));
        }

        if($ticket->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('tickets.index'));
    }
}
