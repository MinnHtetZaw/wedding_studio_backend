<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
        return [
            'id'=>$this->id,
            'category_id'=>$this->category_id,
            'category_name'=>$category->name,
            'name'=>$this->name,
            'description'=>$this->description,
        ];
    }
}
