<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntityRequest;
use App\Http\Requests\UpdateEntityRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of the Entity.
     */
    public function index(Request $request)
    {
        return view('entities.index');
    }

    /**
     * Show the form for creating a new Entity.
     */
    public function create()
    {
        $entity = new Entity();
        $entity->loadDefaultValues();
        return view('entities.create', compact('entity'));
    }

    /**
     * Store a newly created Entity in storage.
     */
    public function store(CreateEntityRequest $request)
    {
        $input = $request->all();

        /** @var Entity $entity */
        $entity = Entity::create($input);

        // get auth user
        $user = auth()->user();

        // attach entity to user
        $user->entities()->attach($entity);

        if($entity){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('entities.index'));
    }

    /**
     * Display the specified Entity.
     */
    public function show($id)
    {
        /** @var Entity $entity */
        $entity = Entity::find($id);

        if (empty($entity) || $entity->user_id != auth()->id()) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('entities.index'));
        }

        return view('entities.show')->with('entity', $entity);
    }

    /**
     * Show the form for editing the specified Entity.
     */
    public function edit($id)
    {
        /** @var Entity $entity */
        $entity = Entity::find($id);

        if (empty($entity) || $entity->user_id != auth()->id()) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('entities.index'));
        }

        return view('entities.edit')->with('entity', $entity);
    }

    /**
     * Update the specified Entity in storage.
     */
    public function update($id, UpdateEntityRequest $request)
    {
        /** @var Entity $entity */
        $entity = Entity::find($id);

        if (empty($entity) || $entity->user_id != auth()->id()) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('entities.index'));
        }

        $entity->fill($request->all());
        if($entity->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('entities.index'));
    }

    /**
     * Remove the specified Entity from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Entity $entity */
        $entity = Entity::find($id);

        if (empty($entity) || $entity->user_id != auth()->id()) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('entities.index'));
        }

        if($entity->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('entities.index'));
    }
}
