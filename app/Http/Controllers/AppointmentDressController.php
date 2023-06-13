<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentDressRequest;
use App\Http\Requests\UpdateAppointmentDressRequest;
use App\Models\AppointmentDress;

class AppointmentDressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentDressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentDressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentDress  $appointmentDress
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentDress $appointmentDress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentDressRequest  $request
     * @param  \App\Models\AppointmentDress  $appointmentDress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentDressRequest $request, AppointmentDress $appointmentDress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentDress  $appointmentDress
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentDress $appointmentDress)
    {
        //
    }
}
