@section('title', 'Inscripciones')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('inscripciones-update', ['inscripcion' => $inscripcion->id]) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                                <p>
                                    {{ $inscripcion->plan_curso->id }}
                                    {{ $inscripcion->plan_curso->sede->acronimo }} |
                                    {{ $inscripcion->plan_curso->grado->nombre }}
                                    {{ $inscripcion->plan_curso->seccion }}
                                    {{ $inscripcion->plan_curso->turno }} |
                                    {{ $inscripcion->plan_curso->bachillerato->nombre ?? 'SB' }}
                                </p>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="estudiante_id" class="form-label">Estudiante</label>
                                <p>{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}</p>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="procedencia" class="form-label">Procedencia</label>
                                <input type="text" class="form-control" id="procedencia" name="procedencia" value="{{ $inscripcion->procedencia }}">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Documentos</label>
                                <ul id="columns" class="list-group">
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="repitente" name="repitente" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->repitente) checked @endif>
                                            <label class="form-check-label" for="repitente">Repitente</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="traslado" name="traslado" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->traslado) checked @endif>
                                            <label class="form-check-label" for="traslado">Traslado</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="libreta_calificacion" name="libreta_calificacion" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->libreta_calificacion) checked @endif>
                                            <label class="form-check-label" for="libreta_calificacion">Libreta de Calificación</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="certificado_estudio" name="certificado_estudio" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->certificado_estudio) checked @endif>
                                            <label class="form-check-label" for="certificado_estudio">Certificado de Estudio</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="partida_nacimiento" name="partida_nacimiento" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->partida_nacimiento) checked @endif>
                                            <label class="form-check-label" for="partida_nacimiento">Partida de Nacimiento</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="foto" name="foto" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->foto) checked @endif>
                                            <label class="form-check-label" for="foto">Foto</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="ficha" name="ficha" class="form-check-input" type="checkbox"
                                                   @if($inscripcion->ficha) checked @endif>
                                            <label class="form-check-label" for="ficha">Ficha</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('inscripciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
