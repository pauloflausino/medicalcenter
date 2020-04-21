<?php

namespace App\Http\Controllers;

use App\Patients;
use App\Doctors;
use App\Appointments;
use Illuminate\Http\Request;
use DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function control()
    {
        $num_pacientes = Patients::count();
        $num_medicos = Doctors::count();
        $consultas_hoje = DB::table('appointments')
                                ->whereDate('appointment_date', date('Y-m-d'))
                                ->count();

        return view('home')->with('num_pacientes', $num_pacientes)
                            ->with('num_medicos', $num_medicos)
                            ->with('consultas_hoje', $consultas_hoje);
    }
}
