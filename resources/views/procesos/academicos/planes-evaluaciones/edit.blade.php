@section('title', 'Planes de Evaluaciones')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('planes-evaluaciones-update', ['plan_evaluacion' => $plan_evaluacion->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')


                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="asignatura" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_evaluacion->plan_academico->plan_curso->sede->acronimo }} |
                                {{ $plan_evaluacion->plan_academico->plan_curso->grado->nombre }}
                                {{ $plan_evaluacion->plan_academico->plan_curso->seccion }}
                                {{ $plan_evaluacion->plan_academico->plan_curso->turno }} |
                                {{ $plan_evaluacion->plan_academico->plan_curso->bachillerato->nombre ?? 'SB' }}
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_academico_id" class="form-label">Asignatura</label>
                            <p>{{ $plan_evaluacion->plan_academico->asignatura->nombre }}</p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="tipo_evaluacion_id" class="form-label">Tipo de Evaluacion</label>
                            <select name="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un tipo de evaluacion</option>
                                @foreach ($tipos_evaluaciones as $tipo_evaluacion)
                                <option value="{{ $tipo_evaluacion->id }}" @if($tipo_evaluacion->id == $plan_evaluacion->tipo_evaluacion_id) selected @endif>{{ $tipo_evaluacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="tema" class="form-label">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema" value="{{ $plan_evaluacion->tema }}">
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="ponderacion" class="form-label">Ponderación</label>
                            <input type="text" class="form-control" id="ponderacion" name="ponderacion" value="{{ $plan_evaluacion->ponderacion }}">
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $plan_evaluacion->fecha }}">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Inscripciones</label>
                            <ul id="columns" class="list-group">
                                @foreach($inscripciones as $inscripcion)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="inscripcion_id{{ $inscripcion->id }}" name="inscripcion_id[]" class="form-check-input" type="checkbox" value="{{ $inscripcion->id }}" @if ($inscripcion->checked) checked @endif>
                                            <label class="form-check-label" for="inscripcion_id{{ $inscripcion->id }}">C.I. {{ $inscripcion->estudiante->documento_numero}} | {{ $inscripcion->estudiante->nombre}} {{ $inscripcion->estudiante->apellido}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('planes-evaluaciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection