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
    public function show($slug)
    {
        /** @var Event $event */
        $event = Event::where('slug', $slug)->first();

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        return view('event.show')->with('event', $event);
    }

    /**
     * Display the specified Event.
     */
    public function showPublic($slug)
    {
        /** @var Event $event */
        $event = Event::where('slug', $slug)->first();

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('home'));
        }

        // if the event status is draft, redirect to home
        if ($event->status == Event::STATUS_DRAFT) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('home'));
        }

        // Get the event sessions
        $sessions = $event->eventSessions;

        // Get all eventSessionTickets associated with sessions
        $eventSessionTickets = $sessions->map(function ($session) {
            return $session->eventSessionTickets;
        })->flatten();

        // Add a property to each eventSessionTicket to check if the ticket is sold out
        $eventSessionTickets->map(function ($ticket) {
            $ticket->isSoldOut = $ticket->limit <= $ticket->count && $ticket->limit > 0;
            return $ticket;
        });

        return view('event.show_public')
            ->with('event', $event)
            ->with('sessionTickets', $eventSessionTickets)
            ->with('paymentOption', json_decode($event->entity->paymentOptions->first()->data));
    }

    /**
     * Show the form for editing the specified Event.
     */
    public function edit($slug)
    {
        /** @var Event $event */
        $event = Event::where('slug', $slug)->first();

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
    public function destroy($slug)
    {
        /** @var Event $event */
        $event = Event::where('slug', $slug)->first();

        if (empty($event)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        if($event->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('events.index'));
    }
}
