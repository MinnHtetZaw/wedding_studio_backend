<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function updateStatusAppointment($id){

        $appointment=Appointment::find($id);
        $appointment->status= '1';
        $appointment->update();
        return response()->json([
            'update'=>$appointment
        ]);
    }

    public function cancelAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status='2';
        $appointment->update();
        return response()->json([
            'cancel'=>$appointment
        ]);
    }
}
