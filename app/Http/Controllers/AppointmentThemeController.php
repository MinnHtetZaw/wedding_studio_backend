<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentThemeRequest;
use App\Http\Requests\UpdateAppointmentThemeRequest;
use App\Models\AppointmentTheme;

class AppointmentThemeController extends Controller
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
     * @param  \App\Http\Requests\StoreAppointmentThemeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentThemeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentTheme  $appointmentTheme
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentTheme $appointmentTheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentThemeRequest  $request
     * @param  \App\Models\AppointmentTheme  $appointmentTheme
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentThemeRequest $request, AppointmentTheme $appointmentTheme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentTheme  $appointmentTheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentTheme $appointmentTheme)
    {
        //
    }
}
