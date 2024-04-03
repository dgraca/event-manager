<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the Venue.
     */
    public function index(Request $request)
    {
        return view('venues.index');
    }

    /**
     * Show the form for creating a new Venue.
     */
    public function create()
    {
        $venue = new Venue();
        $venue->loadDefaultValues();
        return view('venues.create', compact('venue'));
    }

    /**
     * Store a newly created Venue in storage.
     */
    public function store(CreateVenueRequest $request)
    {
        $input = $request->all();

        $input['entity_id'] = auth()->user()->entities->first()->id;

        /** @var Venue $venue */
        $venue = Venue::create($input);
        if($venue){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('venues.index'));
    }

    /**
     * Display the specified Venue.
     */
    public function show($id)
    {
        /** @var Venue $venue */
        $venue = Venue::find($id);

        if (empty($venue)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('venues.index'));
        }

        return view('venues.show')->with('venue', $venue);
    }

    /**
     * Show the form for editing the specified Venue.
     */
    public function edit($id)
    {
        /** @var Venue $venue */
        $venue = Venue::find($id);

        if (empty($venue)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('venues.index'));
        }

        return view('venues.edit')->with('venue', $venue);
    }

    /**
     * Update the specified Venue in storage.
     */
    public function update($id, UpdateVenueRequest $request)
    {
        /** @var Venue $venue */
        $venue = Venue::find($id);

        if (empty($venue)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('venues.index'));
        }

        $venue->fill($request->all());
        if($venue->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('venues.index'));
    }

    /**
     * Remove the specified Venue from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Venue $venue */
        $venue = Venue::find($id);

        if (empty($venue)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('venues.index'));
        }

        if($venue->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('venues.index'));
    }
}
