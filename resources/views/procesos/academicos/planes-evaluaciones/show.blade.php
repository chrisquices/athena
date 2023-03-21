@section('title', 'Planes de Evaluaciones')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_evaluacion->plan_academico->plan_curso->sede->nombre }} |
                                {{ $plan_evaluacion->plan_academico->plan_curso->grado->nombre }}
                                {{ $plan_evaluacion->plan_academico->plan_curso->seccion }}
                                {{ $plan_evaluacion->plan_academico->plan_curso->turno }} |
                                {{ $plan_evaluacion->plan_academico->plan_curso->bachillerato->acronimo ?? 'SB' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Asignatura</label>
                            <p>{{ $plan_evaluacion->plan_academico->asignatura->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Tipo de Evaluacion</label>
                            <p>{{ $plan_evaluacion->tipo_evaluacion->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Tema</label>
                            <p>{{ $plan_evaluacion->tema ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Ponderacion</label>
                            <p>{{ $plan_evaluacion->ponderacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Fecha</label>
                            <p>{{ $plan_evaluacion->fecha ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Inscripciones</label>
                        <ul id="columns" class="list-group">
                            @foreach($inscripciones as $inscripcion)
                                <p>C.I. {{ $inscripcion->estudiante->documento_numero }} | {{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}</p>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('planes-evaluaciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection