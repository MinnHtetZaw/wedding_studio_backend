<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PackageResource::collection(Package::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        $package = new Package();
        $package->code = $request->code;
        $package->name = $request->name;
        $package->price = $request->price;
        $package->dress_id = $request->dress_id;
        $package->no_of_dress = $request->no_of_dress;
        $package->theme_id = $request->theme_id;
        $package->no_of_theme = $request->no_of_theme;
        $package->no_of_retouched_photo = $request->no_of_retouched_photo;
        $package->no_of_normal_photo = $request->no_of_normal_photo;
        $package->main_frame_size = $request->main_frame_size;
        $package->description = $request->description;
        $package->save();
        return response()->json([
            'data'=>'Success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return new PackageResource($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {

    }
}
