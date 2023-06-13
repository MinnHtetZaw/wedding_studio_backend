<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\isNull;

class DressResource extends JsonResource
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
            'name'=>$this->name,
            'type'=>$this->type,
            'category_id'=>$this->category_id,
            'category'=>$category->name,
            'current_qty'=>$this->current_qty,
            'purchase_price'=>$this->purchase_price,
            'selling_price'=>$this->selling_price,
            'supplier'=>$this->supplier,
            'description'=>$this->description,
            'photo'=> $photo,
        ];
    }
}
