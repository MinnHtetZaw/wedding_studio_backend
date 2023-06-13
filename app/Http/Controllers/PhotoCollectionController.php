<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoCollectionRequest;
use App\Http\Requests\UpdatePhotoCollectionRequest;
use App\Http\Resources\PhotoCollectionResource;
use App\Models\PhotoCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PhotoCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhotoCollectionResource::collection(PhotoCollection::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhotoCollectionRequest $request)
    {
        if ($request->file('photo')){
            $photos = $request->file('photo');
            foreach ($photos as $photo){
                $photoCollection = new PhotoCollection();
                $newName = 'photo_'.uniqid().".".$photo->extension();
                $photo->storeAs('public/photo',$newName);
                $photoCollection->photo = $newName;
                $photoCollection->save();
            }
        }
        return response()->json([
            'data'=>'Success',
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoCollection  $photoCollection
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoCollection $photoCollection)
    {
        return response()->download('storage/photo/'.$photoCollection['photo']);
//        return Storage::download(asset('storage/photo/photo_63a3b24686507.webp'));
//          return asset('storage/photo/'.$photoCollection['photo']);
//        return response()->json([
//            'data' => 'Success',
//        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoCollectionRequest  $request
     * @param  \App\Models\PhotoCollection  $photoCollection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoCollectionRequest $request, PhotoCollection $photoCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoCollection  $photoCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoCollection $photoCollection)
    {
        //
    }
}
