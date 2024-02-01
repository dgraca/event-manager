<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the Zone.
     */
    public function index(Request $request)
    {
        return view('zones.index');
    }

    /**
     * Show the form for creating a new Zone.
     */
    public function create()
    {
        $zone = new Zone();
        $zone->loadDefaultValues();
        return view('zones.create', compact('zone'));
    }

    /**
     * Store a newly created Zone in storage.
     */
    public function store(CreateZoneRequest $request)
    {
        $input = $request->all();

        /** @var Zone $zone */
        $zone = Zone::create($input);
        if($zone){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('zones.index'));
    }

    /**
     * Display the specified Zone.
     */
    public function show($id)
    {
        /** @var Zone $zone */
        $zone = Zone::find($id);

        if (empty($zone)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('zones.index'));
        }

        return view('zones.show')->with('zone', $zone);
    }

    /**
     * Show the form for editing the specified Zone.
     */
    public function edit($id)
    {
        /** @var Zone $zone */
        $zone = Zone::find($id);

        if (empty($zone)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('zones.index'));
        }

        return view('zones.edit')->with('zone', $zone);
    }

    /**
     * Update the specified Zone in storage.
     */
    public function update($id, UpdateZoneRequest $request)
    {
        /** @var Zone $zone */
        $zone = Zone::find($id);

        if (empty($zone)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('zones.index'));
        }

        $zone->fill($request->all());
        if($zone->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('zones.index'));
    }

    /**
     * Remove the specified Zone from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Zone $zone */
        $zone = Zone::find($id);

        if (empty($zone)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('zones.index'));
        }

        if($zone->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('zones.index'));
    }
}
