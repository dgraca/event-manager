<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventSessionsRequest;
use App\Http\Requests\UpdateEventSessionsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\EventSession;
use Illuminate\Http\Request;

class EventSessionsController extends Controller
{
    /**
     * Display a listing of the EventSessions.
     */
    public function index(Request $request)
    {
        return view('event_sessions.index');
    }

    /**
     * Show the form for creating a new EventSessions.
     */
    public function create()
    {
        $eventSessions = new EventSession();
        $eventSessions->loadDefaultValues();
        return view('event_sessions.create', compact('eventSessions'));
    }

    /**
     * Store a newly created EventSessions in storage.
     */
    public function store(CreateEventSessionsRequest $request)
    {
        $input = $request->all();

        /** @var EventSession $eventSessions */
        $eventSessions = EventSession::create($input);
        if($eventSessions){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event-sessions.index'));
    }

    /**
     * Display the specified EventSessions.
     */
    public function show($id)
    {
        /** @var EventSession $eventSessions */
        $eventSessions = EventSession::find($id);

        if (empty($eventSessions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        return view('event_sessions.show')->with('eventSessions', $eventSessions);
    }

    /**
     * Show the form for editing the specified EventSessions.
     */
    public function edit($id)
    {
        /** @var EventSession $eventSessions */
        $eventSessions = EventSession::find($id);

        if (empty($eventSessions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        return view('event_sessions.edit')->with('eventSessions', $eventSessions);
    }

    /**
     * Update the specified EventSessions in storage.
     */
    public function update($id, UpdateEventSessionsRequest $request)
    {
        /** @var EventSession $eventSessions */
        $eventSessions = EventSession::find($id);

        if (empty($eventSessions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        $eventSessions->fill($request->all());
        if($eventSessions->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event-sessions.index'));
    }

    /**
     * Remove the specified EventSessions from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var EventSession $eventSessions */
        $eventSessions = EventSession::find($id);

        if (empty($eventSessions)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        if($eventSessions->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event-sessions.index'));
    }
}
