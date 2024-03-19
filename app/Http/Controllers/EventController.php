<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the Events.
     */
    public function index(Request $request)
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new Event.
     */
    public function create()
    {
        $event = new Event();
        $event->loadDefaultValues();
        return view('event.create', compact('event'));
    }

    /**
     * Display the specified Event.
     */
    public function show($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        return view('event.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     */
    public function edit($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event.index'));
        }

        return view('event.edit')->with('event', $event);
    }

    /**
     * Remove the specified Event from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Event $event */
        $event = Event::find($id);

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('event.index'));
        }

        if($event->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('event.index'));
    }
}
