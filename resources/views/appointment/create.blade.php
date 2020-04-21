@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Faça o agendamento da consulta médica
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    @if($method == 'put')
                    <form action="{{ route('consultas.update', $appointment->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('consultas.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input id="description" type="text" name="description" class="form-control" value="{{ $appointment->description }}"/>
                        </div>

                        <div class="form-group">
                            <label for="appointment_date">Data/Hora</label>
                            <input id="appointment_date" type="datetime-local" name="appointment_date" class="form-control" value="{{ strftime('%Y-%m-%dT%H:%M', strtotime($appointment->appointment_date)) }}"/>
                        </div>

                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="patient_id" class="form-control" id="patient_id" value="{{ $appointment->id_patient }}">
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $patient->id == $appointment->id_patient ? 'selected="selected"' : ''}}> {{ $patient->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="doctor_id">Médico</label>
                            <select name="doctor_id" class="form-control" id="doctor_id" value="{{ $appointment->id_doctor }}">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->id_doctor ? 'selected="selected"' : ''}}> {{ $doctor->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/consultas') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



