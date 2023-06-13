<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $with = ['dresses','themes'];
    public function dresses(){
        return $this->hasMany(AppointmentDress::class);
    }
    public function themes(){
        return $this->hasMany(AppointmentTheme::class);
    }
}
