@section('title', 'Inscripciones')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Plan de Curso</label>
                            <p>{{ $inscripcion->plan_curso->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Estudiante</label>
                            <p>{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Procedencia</label>
                            <p>{{ $inscripcion->procedencia ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Documentos</label>
                            <ul id="columns" class="list-group">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->repitente) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Repitente</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->traslado) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Traslado</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->libreta_calificacion) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Libreta de Calificación</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->certificado_estudio) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Certificado de Estudio</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->partida_nacimiento) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Partida de Nacimiento</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->foto) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Foto</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" @if($inscripcion->ficha) checked @endif disabled>
                                        <label class="form-check-label" for="col_id">Ficha</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('inscripciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
