<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\AppointmentDress;
use App\Models\AppointmentTheme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment::
        when(request('date'),fn($q)=>$q->where('date',request('date')))
        ->get();
        return AppointmentResource::collection($appointment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointment = new Appointment();

        $last_voucher = Appointment::get()->last();
        if($last_voucher != null){
            $voucher_code = "BOP-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) .sprintf("%02s", ($last_voucher->id+1));
        }else{
            $voucher_code = "BOP-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) .sprintf("%02s", 1);
        }

        $appointment->booking=$voucher_code;
        $appointment->date = $request->date;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->name = $request->name;
        $appointment->phone = $request->phone;
        $appointment->package_id = $request->package_id;
        $appointment->save();

        if (isset($request->dress_id)){
            $dress_id = json_decode($request->dress_id);
            foreach ($dress_id as $dress){
                $appointment_dress = new AppointmentDress();
                $appointment_dress->appointment_id = $appointment->id;
                $appointment_dress->dress_id = $dress;
                $appointment_dress->save();
            }
        }
        if (isset($request->theme_id)){
            $theme_id = json_decode($request->theme_id);
            foreach ($theme_id as $theme) {
                $appointment_theme = new AppointmentTheme();
                $appointment_theme->appointment_id = $appointment->id;
                $appointment_theme->theme_id = $theme;
                $appointment_theme->save();
            }
        }
        return response()->json([
            'data' => 'Success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
            $appointment->delete();
            return response()->json([
                'data'=>'Appointment Deleted Successfully!',
            ]);
    }
}
