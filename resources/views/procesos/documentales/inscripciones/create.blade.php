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
                    <form action="{{ route('inscripciones-store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                                <select name="plan_curso_id" id="plan_curso_id" class="form-control select2">
                                    <option value="" selected disabled>Seleccione un plan de curso</option>
                                    @foreach ($planes_cursos as $plan_curso)
                                        <option value="{{ $plan_curso->id }}">
                                            {{ $plan_curso->sede->acronimo }} |
                                            {{ $plan_curso->grado->nombre }}
                                            {{ $plan_curso->seccion }}
                                            {{ $plan_curso->turno }} |
                                            {{ $plan_curso->bachillerato->nombre ?? 'SB' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="estudiante_id" class="form-label">Estudiante</label>
                                <select name="estudiante_id" id="estudiante_id" class="form-control select2">
                                    <option value="">Seleccione un estudiante</option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="procedencia" class="form-label">Procedencia</label>
                                <input type="text" class="form-control" id="procedencia" name="procedencia">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Documentos</label>
                                <ul id="columns" class="list-group">
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="repitente" name="repitente" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Repitente</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="traslado" name="traslado" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Traslado</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="libreta_calificacion" name="libreta_calificacion" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Libreta de Calificación</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="certificado_estudio" name="certificado_estudio" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Certificado de Estudio</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="partida_nacimiento" name="partida_nacimiento" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Partida de Nacimiento</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="foto" name="foto" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Foto</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input id="ficha" name="ficha" class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label" for="col_id">Ficha</label>
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
