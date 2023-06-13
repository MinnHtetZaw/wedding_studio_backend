<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Dress;
use App\Models\Scenery;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dress_category = Category::find($this->dress_id);
        $theme_category = Category::find($this->theme_id);
        $available_dresses = Dress::where('category_id',$this->dress_id)->get();
        $available_themes = Scenery::where('category_id',$this->theme_id)->get();
        return [
            'id'=> $this->id,
            'code'=> $this->code,
            'name'=> $this->name,
            'price'=> $this->price,
            'dress_id'=> $this->dress_id,
            'theme_id'=> $this->theme_id,
            'dress_category' => $dress_category->name ?? 'Category',
            'theme_category' => $theme_category->name ?? 'Theme',
            'no_of_dress'=> $this->no_of_dress,
            'no_of_theme'=> $this->no_of_theme,
            'no_of_retouched_photo'=> $this->no_of_retouched_photo,
            'no_of_normal_photo'=> $this->no_of_normal_photo,
            'main_frame_size'=> $this->main_frame_size,
            'description'=> $this->description,
            'available_dresses'=> DressResource::collection($available_dresses),
            'available_themes'=> SceneryResource::collection($available_themes),
        ];
    }
}
