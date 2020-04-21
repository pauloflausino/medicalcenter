<?php

namespace App\Http\Controllers;

use App\Appointments;
use Illuminate\Http\Request;
use App\Patients;
use App\Doctors;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointments::all();
        return view('appointment.index')->with('appointments', $appointments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $appointment = new Appointments();
        $patients = Patients::all();
        $doctors = Doctors::all();

        return view('appointment.create')->with('patients', $patients)
                                        ->with('doctors', $doctors)
                                        ->with('method', $method)
                                        ->with('appointment', $appointment);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'appointment_date' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $appointment = new Appointments();
            $appointment->description = $request->input('description');
            $appointment->appointment_date = $request->input('appointment_date');
            $appointment->id_patient = $request->input('patient_id');
            $appointment->id_doctor = $request->input('doctor_id');
            $appointment->save();

            return redirect()->route('consultas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function show(Appointments $appointments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'put';
        $appointment = Appointments::find($id);
        $patients = Patients::all();
        $doctors = Doctors::all();

        return view('appointment.create')->with('patients', $patients)
                                        ->with('doctors', $doctors)
                                        ->with('method', $method)
                                        ->with('appointment', $appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'appointment_date' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $appointment = Appointments::find($id);
            $appointment->description = $request->input('description');
            $appointment->appointment_date = $request->input('appointment_date');
            $appointment->id_patient = $request->input('patient_id');
            $appointment->id_doctor = $request->input('doctor_id');
            $appointment->save();

            return redirect()->route('consultas.index');
        }//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointments::find($id);

        $appointment->delete();

        return redirect()->route('consultas.index');
    }
}
