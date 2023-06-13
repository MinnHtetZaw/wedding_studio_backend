<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDressRequest;
use App\Http\Requests\UpdateDressRequest;
use App\Http\Resources\DressResource;
use App\Models\Dress;
use Illuminate\Support\Facades\Storage;

class DressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DressResource::collection(Dress::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDressRequest $request)
    {
        $dress = new Dress();
        $dress->category_id = $request->category_id;
        $dress->code = $request->code;
        $dress->name = $request->name;
        $dress->type = $request->type;
        $dress->current_qty = $request->current_qty;
        $dress->purchase_price = $request->purchase_price;
        $dress->selling_price = $request->selling_price;
        $dress->supplier = $request->supplier;
        $dress->description = ucfirst($request->description);
        if ($request->file('photo')){
            $newName ='photo_'.uniqid().".".$request->file('photo')->extension();
            $request->file('photo')->storeAs('public/photo',$newName);
            $dress->photo = $newName;
        }
        $dress->save();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function show(Dress $dress)
    {
        return new DressResource($dress);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDressRequest  $request
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDressRequest $request, Dress $dress)
    {
        if($request->delete_photo){
            $oldPhoto = asset('storage/photo/'.$dress->photo);
            Storage::delete($oldPhoto);
            $dress->photo = null;
            $dress->update();
            return response()->json([
                'data'=>'Success'
            ]);
        }
        $dress->category_id = $request->category_id;
        $dress->code = $request->code;
        $dress->name = $request->name;
        $dress->type = $request->type;
        $dress->current_qty = $request->current_qty;
        $dress->purchase_price = $request->purchase_price;
        $dress->selling_price = $request->selling_price;
        $dress->supplier = $request->supplier;
        $dress->description = $request->description;
        if ($request->file('photo')){
            if(!is_null($dress->photo)){
                $oldPhoto = asset('storage/photo/'.$dress->photo);
                Storage::delete($oldPhoto);
            }
            $newName ='photo_'.uniqid().".".$request->file('photo')->extension();
            $request->file('photo')->storeAs('public/photo',$newName);
            $dress->photo = $newName;
        }
        $dress->update();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dress  $dress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dress $dress)
    {
        if(!is_null($dress->photo)){
            $oldPhoto = asset('storage/photo/'.$dress->photo);
            Storage::delete($oldPhoto);
        }
        $dress->delete();
        return response()->json([
            'data'=>'Success'
        ]);
    }
}
