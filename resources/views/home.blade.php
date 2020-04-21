@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="dash">
                        <li class="button-white"><a href="{{ url('/pacientes') }}">Pacientes</a></li>
                        <li class="button-white"><a href="{{ url('/medicos') }}">Médicos</a></li>
                        <li class="button-white"><a href="{{ url('/consultas') }}">Consultas</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
