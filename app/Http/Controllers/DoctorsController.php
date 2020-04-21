<?php

namespace App\Http\Controllers;

use App\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctor.index')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $doctor = new Doctors();
        return view('doctor.create')->with('method', $method)
                                     ->with('doctor', $doctor);
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
            'name' => 'required|min:3',
            'crm' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $doctor = new Doctors();
            $doctor->name = $request->input('name');
            $doctor->crm = $request->input('crm');
            $doctor->phone = $request->input('phone');
            $doctor->save();

            return redirect()->route('medicos.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(Doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'put';
        $doctor = Doctors::find($id);
        return view('doctor.create')->with('method', $method)
        ->with('doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'crm' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $doctor = Doctors::find($id);
            $doctor->name = $request->input('name');
            $doctor->crm = $request->input('crm');
            $doctor->phone = $request->input('phone');
            $doctor->save();

            return redirect()->route('medicos.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctors::find($id);

        $doctor->delete();

        return redirect()->route('medicos.index');
    }

    // API
    public function list(){
        $doctors = Doctors::all();
        return response()->json($doctors);
    }
}
