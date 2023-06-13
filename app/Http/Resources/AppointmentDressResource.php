<?php

namespace App\Http\Resources;

use App\Models\Dress;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentDressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dress = Dress::find($this->dress_id);
        return [
            'id' => $this->id,
            'appointment_id' => $this->appointment_id,
            'dress_id' => $this->dress_id,
            'dress_name' => $dress->name,
            'photo' => asset('storage/photo/'.$dress->photo),
        ];
    }
}
