<?php

namespace App\Http\Resources;

use App\Models\Scenery;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentThemeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $theme = Scenery::find($this->theme_id);
        return [
            'id' => $this->id,
            'appointment_id' => $this->appointment_id,
            'theme_id' => $this->theme_id,
            'theme_name' => $theme->name,
            'photo' => asset('storage/photo/'.$theme->photo),
        ];
    }
}
