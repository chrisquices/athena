@section('title', 'Operativos')
@section('level-1', 'Informes')
@section('level-2', 'Movimientos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informes-movimientos-documentales-print') }}">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="size" class="form-label">Tabla</label>
                            <p>{{ $tabla_nombre }}</p>
                        </div>

                        <input type="hidden" name="tabla" value="calificaciones">

                        <div class="col-lg-6 mb-4">
                            <label for="size" class="form-label">Tamaño de Hoja</label>
                            <select id="size" name="size" class="form-control select2">
                                <option value="a4">A4</option>
                                <option value="legal">Legal</option>
                                <option value="letter">Carta</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="orientation" class="form-label">Orientación</label>
                            <select id="orientation" name="orientation" class="form-control select2">
                                <option value="portrait">Vertical</option>
                                <option value="landscape">Horizontal</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                            <select id="plan_curso_id" name="plan_curso_id" class="form-control select2" required>
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

                        <div class="col-lg-6 mb-4">
                            <label for="plan_academico_id" class="form-label">Plan Academico / Asignatura</label>
                            <select id="plan_academico_id" name="plan_academico_id" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione un plan academico / asignatura</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="plan_evaluacion_id" class="form-label">Plan Evaluacion</label>
                            <select id="plan_evaluacion_id" name="plan_evaluacion_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un plan evaluacion</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('informes-index') }}" class="btn btn-outline-primary float-start"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
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
    });

    $(document).on("change", "#plan_academico_id", function() {
        loadPlanesEvaluaciones();
    });

    function loadPlanesAcademicos() {
        $.ajax({
            type: "GET",
            url: `/informes/movimientos/planes-academicos/get/planes-academicos`,
            data: {
                plan_curso_id: $('#plan_curso_id option:selected').val(),
            },
        })
            .done(function(response) {
                container = $('#plan_academico_id');

                container.empty();

                container.append(`
                    <option value="" selected disabled>Seleccione un plan academico / asignatura</option>
                `);

                response.forEach(element => {
                    container.append(`
                        <option value="${ element.id }">${ element.asignatura.nombre }</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }

    function loadPlanesEvaluaciones() {
        $.ajax({
            type: "GET",
            url: `/informes/movimientos/calificaciones/get/planes-evaluaciones`,
            data: {
                plan_academico_id: $('#plan_academico_id option:selected').val(),
            },
        })
            .done(function(response) {
                container = $('#plan_evaluacion_id');

                container.empty();

                container.append(`
                    <option value="" selected disabled>Seleccione un plan evaluacion</option>
                `);

                response.forEach(element => {
                    container.append(`
                        <option value="${ element.id }">Etapa ${element.etapa } | ${ element.tema }</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection
