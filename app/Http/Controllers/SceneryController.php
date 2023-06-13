<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSceneryRequest;
use App\Http\Requests\UpdateSceneryRequest;
use App\Http\Resources\SceneryResource;
use App\Models\Scenery;
use Illuminate\Support\Facades\Storage;

class SceneryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SceneryResource::collection(Scenery::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSceneryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSceneryRequest $request)
    {
        $scenery = new Scenery();
        $scenery->category_id = $request->category_id;
        $scenery->code = $request->code;
        $scenery->name = $request->name;
        $scenery->type = $request->type;
        $scenery->description = $request->description;
        if ($request->file('photo')){
            $newName ='photo_'.uniqid().".".$request->file('photo')->extension();
            $request->file('photo')->storeAs('public/photo',$newName);
            $scenery->photo = $newName;
        }
        $scenery->save();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scenery  $scenery
     * @return \Illuminate\Http\Response
     */
    public function show(Scenery $scenery)
    {
        return new SceneryResource($scenery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSceneryRequest  $request
     * @param  \App\Models\Scenery  $scenery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSceneryRequest $request, Scenery $scenery)
    {
        if($request->delete_photo){
            $oldPhoto = asset('storage/photo/'.$scenery->photo);
            Storage::delete($oldPhoto);
            $scenery->photo = null;
            $scenery->update();
            return response()->json([
                'data'=>'Success'
            ]);
        }

        $scenery->category_id = $request->category_id;
        $scenery->code = $request->code;
        $scenery->name = $request->name;
        $scenery->type = $request->type;
        $scenery->description = $request->description;
        if ($request->file('photo')){
            if(!is_null($scenery->photo)){
                $oldPhoto = asset('storage/photo/'.$scenery->photo);
                Storage::delete($oldPhoto);
            }
            $newName ='photo_'.uniqid().".".$request->file('photo')->extension();
            $request->file('photo')->storeAs('public/photo',$newName);
            $scenery->photo = $newName;
        }
        $scenery->save();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scenery  $scenery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scenery $scenery)
    {
        if(!is_null($scenery->photo)){
            $oldPhoto = asset('storage/photo/'.$scenery->photo);
            Storage::delete($oldPhoto);
        }
        $scenery->delete();
        return response()->json([
            'data' => 'Success',]
        );
    }
}
