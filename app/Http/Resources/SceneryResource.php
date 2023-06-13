<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class SceneryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $category = Category::find($this->category_id);
        if(is_null($this->photo)){
            $photo = null;
        }else{
            $photo = asset('storage/photo/'.$this->photo);
        }
        return [
            'id'=>$this->id,
            'code'=>$this->code,
            'type'=>$this->type,
            'name'=>$this->name,
            'category_id'=>$this->category_id,
            'category'=>$category->name,
            'description'=>$this->description,
            'photo'=> $photo,
        ];
    }
}
