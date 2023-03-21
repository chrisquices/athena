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
                <form action="{{ route('planes-evaluaciones-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="asignatura" class="form-label">Plan de Curso</label>
                            <select name="plan_curso_id" id="plan_curso_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un plan de curso</option>
                                @foreach ($planes_cursos as $plan_curso)
                                <option value="{{ $plan_curso->id }}" @if(old('plan_curso_id')==$plan_curso->id) selected @endif>
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
                            <label for="plan_academico_id" class="form-label">Asignatura</label>
                            <select name="plan_academico_id" id="plan_academico_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una asignatura</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="tipo_evaluacion_id" class="form-label">Tipo de Evaluacion</label>
                            <select name="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un tipo de evaluacion</option>
                                @foreach ($tipos_evaluaciones as $tipo_evaluacion)
                                <option value="{{ $tipo_evaluacion->id }}">{{ $tipo_evaluacion->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="tema" class="form-label">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema" value="{{ old('tema') }}">
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="ponderacion" class="form-label">Ponderación</label>
                            <input type="text" class="form-control" id="ponderacion" name="ponderacion" value="{{ old('ponderacion') }}">
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Inscripciones</label>
                            <ul id="columns" class="list-group">
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

@section('scripts')
<script>
    $(document).on("change", "#plan_curso_id", function() {
        loadPlanesAcademicos();
        loadInscripciones();
    });

    function loadPlanesAcademicos() {
        $.ajax({
                type: "GET",
                url: `/procesos/academicos/planes-evaluaciones/get/planes-academicos`,
                data: {
                    id: $('#plan_curso_id option:selected').val(),
                },
            })
            .done(function(response) {
                elementAsignatura = $('#plan_academico_id');

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" selected disabled>Seleccione una asignatura</option>
                `);

                response.forEach(element => {
                    elementAsignatura.append(`
                        <option value="${element.id}">${element.asignatura.nombre}</option>
                    `);
                });

                response.inscripcion.forEach(element => {
                    elementAsignatura.append(`
                        <li class="list-group-item">
                            <div class="form-check">
                                <input id="inscripcion_id${ element.id }" name="inscripcion_id[]" class="form-check-input" type="checkbox" value="${element.id}" checked>
                                    <label class="form-check-label" for="inscripcion_id${element.id}">C.I. ${element.estudiante.documento_numero} | ${element.estudiante.nombre} ${element.estudiante.apellido}</label>
                            </div>
                        </li>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }

    function loadInscripciones() {
        $.ajax({
            type: "GET",
            url: `/procesos/academicos/planes-evaluaciones/get/inscripciones`,
            data: {
                id: $('#plan_curso_id option:selected').val(),
            },
        })
            .done(function(response) {
                elementAsignatura = $('#columns');

                elementAsignatura.empty();

                response.forEach(element => {
                    console.log(element);
                    elementAsignatura.append(`
                        <li class="list-group-item">
                            <div class="form-check">
                                <input id="inscripcion_id${ element.id }" name="inscripcion_id[]" class="form-check-input" type="checkbox" value="${element.id}" checked>
                                    <label class="form-check-label" for="inscripcion_id${element.id}">C.I. ${element.estudiante.documento_numero} | ${element.estudiante.nombre} ${element.estudiante.apellido}</label>
                            </div>
                        </li>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection