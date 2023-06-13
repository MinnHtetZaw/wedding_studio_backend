<?php

namespace App\Http\Resources;

use App\Models\Package;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->status == 0){
            $status_text = 'Pending';
        }elseif ($this->status == 1){
            $status_text = 'Confirmed';
        }elseif($this->status ==  2){
            $status_text = 'Canceled';
        }

        $package = Package::find($this->package_id);

        return [
            'id'=>$this->id,
            'booking'=>$this->booking,
            'date'=>$this->date,
            'start'=>$this->start,
            'end'=>$this->end,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'status'=>$this->status,
            'status_text'=>$status_text,
            'package_id'=>$this->package_id,
            'package_name'=>$package->name,
            'dresses'=> AppointmentDressResource::collection($this->dresses),
            'themes'=> AppointmentThemeResource::collection($this->themes),
        ];
    }
}
