<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the Events.
     */
    public function index(Request $request)
    {
        return view('events.index');
    }

    /**
     * Show the form for creating a new Events.
     */
    public function create()
    {
        $events = new Events();
        $events->loadDefaultValues();
        return view('events.create', compact('events'));
    }

    /**
     * Store a newly created Events in storage.
     */
    public function store(CreateEventsRequest $request)
    {
        $input = $request->all();

        /** @var Events $events */
        $events = Events::create($input);
        if($events){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('events.index'));
    }

    /**
     * Display the specified Events.
     */
    public function show($id)
    {
        /** @var Events $events */
        $events = Events::find($id);

        if (empty($events)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        return view('events.show')->with('events', $events);
    }

    /**
     * Show the form for editing the specified Events.
     */
    public function edit($id)
    {
        /** @var Events $events */
        $events = Events::find($id);

        if (empty($events)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('events', $events);
    }

    /**
     * Update the specified Events in storage.
     */
    public function update($id, UpdateEventsRequest $request)
    {
        /** @var Events $events */
        $events = Events::find($id);

        if (empty($events)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        $events->fill($request->all());
        if($events->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Events from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Events $events */
        $events = Events::find($id);

        if (empty($events)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('events.index'));
        }

        if($events->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('events.index'));
    }
}
