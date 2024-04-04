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
     * Display a listing of the AccessTickets.
     */
    public function index(Request $request)
    {
        return view('access_tickets.index');
    }

    /**
     * Show the form for creating a new AccessTickets.
     */
    public function create()
    {
        $accessTicket = new AccessTicket();
        $accessTicket->loadDefaultValues();
        return view('access_tickets.create', compact('accessTicket'));
    }

    /**
     * Store a newly created AccessTickets in storage.
     */
    public function store(CreateAccessTicketRequest $request)
    {
        $input = $request->all();

        /** @var AccessTicket $accessTicket */
        $accessTicket = AccessTicket::create($input);
        if($accessTicket){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('access-tickets.index'));
    }

    /**
     * Display the specified AccessTickets.
     */
    public function show($id)
    {
        /** @var AccessTicket $accessTicket */
        $accessTicket = AccessTicket::find($id);

        if (empty($accessTicket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        return view('access_tickets.show')->with('accessTicket', $accessTicket);
    }

    /**
     * Show the form for editing the specified AccessTickets.
     */
    public function edit($id)
    {
        /** @var AccessTicket $accessTicket */
        $accessTicket = AccessTicket::find($id);

        if (empty($accessTicket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        return view('access_tickets.edit')->with('accessTicket', $accessTicket);
    }

    /**
     * Update the specified AccessTickets in storage.
     */
    public function update($id, UpdateAccessTicketRequest $request)
    {
        /** @var AccessTicket $accessTicket */
        $accessTicket = AccessTicket::find($id);

        if (empty($accessTicket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        $accessTicket->fill($request->all());
        if($accessTicket->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('access-tickets.index'));
    }

    /**
     * Remove the specified AccessTickets from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var AccessTicket $accessTicket */
        $accessTicket = AccessTicket::find($id);

        if (empty($accessTicket)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        if($accessTicket->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('access-tickets.index'));
    }
}