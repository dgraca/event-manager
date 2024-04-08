<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventSessionRequest;
use App\Http\Requests\UpdateEventSessionRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\EventSession;
use Illuminate\Http\Request;

class EventSessionController extends Controller
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
        $eventSession = new EventSession();
        $eventSession->loadDefaultValues();
        return view('event_sessions.create', compact('eventSession'));
    }

    /**
     * Store a newly created EventSessions in storage.
     */
    public function store(CreateEventSessionRequest $request)
    {
        $input = $request->all();

        /** @var EventSession $eventSession */
        $eventSession = EventSession::create($input);
        if($eventSession){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event-sessions.index'));
    }

    /**
     * Display the specified EventSessions.
     */
    public function show($slug)
    {
        /** @var EventSession $eventSession */
        $eventSession = EventSession::where('slug', $slug)->first();

        if (empty($eventSession)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        return view('event_sessions.show')->with('eventSessions', $eventSession);
    }

    /**
     * Show the form for editing the specified EventSessions.
     */
    public function edit($slug)
    {
        /** @var EventSession $eventSession */
        $eventSession = EventSession::where('slug', $slug)->first();

        if (empty($eventSession)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        return view('event_sessions.edit')->with('eventSession', $eventSession);
    }

    /**
     * Update the specified EventSessions in storage.
     */
    public function update($slug, UpdateEventSessionRequest $request)
    {
        /** @var EventSession $eventSession */
        $eventSession = EventSession::where('slug', $slug)->first();

        if (empty($eventSession)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        $eventSession->fill($request->all());
        if($eventSession->save()){
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
    public function destroy($slug)
    {
        /** @var EventSession $eventSession */
        $eventSession = EventSession::where('slug', $slug)->first();

        if (empty($eventSession)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event-sessions.index'));
        }

        if($eventSession->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event-sessions.index'));
    }
}
