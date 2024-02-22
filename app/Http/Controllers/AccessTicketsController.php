<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccessTicketsRequest;
use App\Http\Requests\UpdateAccessTicketsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\AccessTicket;
use Illuminate\Http\Request;

class AccessTicketsController extends Controller
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
        $accessTickets = new AccessTicket();
        $accessTickets->loadDefaultValues();
        return view('access_tickets.create', compact('accessTickets'));
    }

    /**
     * Store a newly created AccessTickets in storage.
     */
    public function store(CreateAccessTicketsRequest $request)
    {
        $input = $request->all();

        /** @var AccessTicket $accessTickets */
        $accessTickets = AccessTicket::create($input);
        if($accessTickets){
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
        /** @var AccessTicket $accessTickets */
        $accessTickets = AccessTicket::find($id);

        if (empty($accessTickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        return view('access_tickets.show')->with('accessTickets', $accessTickets);
    }

    /**
     * Show the form for editing the specified AccessTickets.
     */
    public function edit($id)
    {
        /** @var AccessTicket $accessTickets */
        $accessTickets = AccessTicket::find($id);

        if (empty($accessTickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        return view('access_tickets.edit')->with('accessTickets', $accessTickets);
    }

    /**
     * Update the specified AccessTickets in storage.
     */
    public function update($id, UpdateAccessTicketsRequest $request)
    {
        /** @var AccessTicket $accessTickets */
        $accessTickets = AccessTicket::find($id);

        if (empty($accessTickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        $accessTickets->fill($request->all());
        if($accessTickets->save()){
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
        /** @var AccessTicket $accessTickets */
        $accessTickets = AccessTicket::find($id);

        if (empty($accessTickets)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('access-tickets.index'));
        }

        if($accessTickets->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('access-tickets.index'));
    }
}
