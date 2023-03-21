@section('title', 'Calificaciones')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
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

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <label for="plan_academico_id" class="form-label">Asignatura</label>
                            <select name="plan_academico_id" id="plan_academico_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una asignatura</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <label for="plan_evaluacion_id" class="form-label">Evaluacion</label>
                            <select name="plan_evaluacion_id" id="plan_evaluacion_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una evaluacion</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <label for="name" class="form-label">&nbsp;</label>
                            <button class="btn btn-primary form-control" id="generar">
                                <i class="fa fa-print"></i>
                                Generar Lista
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="form" action="{{ route('calificaciones-store') }}" method="POST">
                        <input type="hidden" id="calificacion_id" name="calificacion_id">

                        <div class="table-responsive">
                            <table id="datatablen" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Estudiante</th>
                                    <th>Observacion</th>
                                    <th class="status">Puntaje Total de la Evaluacion</th>
                                    <th class="status">Estado</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <button id="guardar" type="submit" class="btn btn-primary float-end"><i
                                            class="fa fa-check-circle me-2"></i>Guardar
                                </button>
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
        let calificacionId = '';

        $('#guardar').hide();

        function resetAsignatura() {
            $('#plan_academico_id').empty();
            $('#plan_academico_id').append(`<option value="" selected disabled>Seleccione una asignatura</option>`);
        }

        function resetPlanEvaluacion() {
            $('#plan_evaluacion_id').empty();
            $('#plan_evaluacion_id').append(`<option value="" selected disabled>Seleccione una evaluacion</option>`);
        }

        $(document).on("change", "#plan_curso_id", function () {
            resetAsignatura();
            resetPlanEvaluacion();
            getAsignaturas();
            emptyTable();
        });

        $(document).on("change", "#plan_academico_id", function () {
            resetPlanEvaluacion();
            getPlanesEvaluaciones();
            emptyTable();
        });

        $(document).on("change", "#plan_evaluacion_id", function () {
            emptyTable();
        });

        $(document).on("submit", "#form", function () {
            $('#calificacion_id').val(calificacionId);
        });

        $(document).on("click", "#generar", function () {
            let planCurso = $('#plan_curso_id option:selected').val();
            let planAcademico = $('#plan_academico_id option:selected').val();
            let planEvaluacion = $('#plan_evaluacion_id option:selected').val();

            if (planCurso && planAcademico && planEvaluacion) {
                updateTableData();
                $('#guardar').fadeIn();
            }

            if (!planCurso || !planAcademico || !planEvaluacionn) {

                toastr.error('Seleccione todos los campos')
            }
        });

        function emptyTable() {
            $('tbody tr').empty();
        }

        function getAsignaturas() {
            $.ajax({
                type: "GET",
                url: '/procesos/documentales/asistencias/get/asignaturas',
                data: {
                    id: $('#plan_curso_id option:selected').val(),
                }
            }).done(function (data) {
                let elementAsignatura = $('#plan_academico_id');

                elementAsignatura.empty();

                elementAsignatura.append(`<option value="" selected disabled>Seleccione una asignatura</option>`);

                data.forEach(element => {
                    elementAsignatura.append(`<option value="${element.id}">${element.asignatura.nombre}</option>`);
                });

            }).fail(function (data) {
                toastr.success(DEFAULT_ERROR_RESPONSE);
            });
        }

        function getPlanesEvaluaciones() {
            $.ajax({
                type: "GET",
                url: '/procesos/documentales/calificaciones/get/planes-evaluaciones',
                data: {
                    id: $('#plan_academico_id option:selected').val(),
                }
            }).done(function (data) {
                let elementAsignatura = $('#plan_evaluacion_id');

                elementAsignatura.empty();

                elementAsignatura.append(`<option value="" selected disabled>Seleccione una evaluacion</option>`);

                data.forEach(element => {
                    elementAsignatura.append(`<option value="${element.id}">${element.tipo_evaluacion.nombre} | ${element.tema}</option>`);
                });

            }).fail(function (data) {
                toastr.success(DEFAULT_ERROR_RESPONSE);
            });
        }

        function updateTableData() {
            $('#datatablen').DataTable({
                destroy: true,
                bFilter: false,
                bPaginate: false,
                bInfo: false,
                language: SPANISH,
                autoWidth: false,
                lengthMenu: [
                    [30, 60, 90, -1],
                    [30, 60, 90],
                ],
                ajax: {
                    type: "GET",
                    url: "/procesos/documentales/calificaciones/get/calificaciones",
                    data: {
                        plan_curso_id: $('#plan_curso_id option:selected').val(),
                        plan_academico_id: $('#plan_academico_id option:selected').val(),
                        plan_evaluacion_id: $('#plan_evaluacion_id option:selected').val(),
                    },
                    dataSrc: ""
                },
                columns: [
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                                <td>
                                    ${data.inscripcion.estudiante.nombre} ${data.inscripcion.estudiante.apellido}
                                    <input type="hidden" name="inscripcion_plan_evaluacion_id[]" value="${data.id}"
                                </td>
                            `;
                        },
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                                <td>
                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="observacion[]" value="${data.observacion}" required>
                                        </div>
                                    </div>
                                </td>
                            `;
                        },
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            calificacionId = data.id;

                            return `
                                <td>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label mr-2">${data.plan_evaluacion.ponderacion} Puntos</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="number" name="puntaje[]" value="${data.puntaje_logrado}" required>
                                        </div>
                                    </div>
                                </td>
                            `;
                        },
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                                <td class="status-Activo">
                                    <input type="checkbox" class="btn-check" name="anular[]" id="anular${data.inscripcion.id}" value="${data.id}" ${(data.estado == 'Anulado') ? 'checked' : ''}>
                                    <label class="btn btn-outline-primary" for="anular${data.inscripcion.id}">Anular</label>
                                </td>
                            `;
                        },
                    },
                ]
            });
        }
    </script>
@endsection