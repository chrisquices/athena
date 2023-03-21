@section('title', 'Asistencias')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

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
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" value="{{ date('Y-m-d') }}">
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
                    <form id="form" action="{{ route('asistencias-documental-store') }}" method="POST">
                        <input type="hidden" id="action" name="action">
                        <input type="hidden" id="date" name="fecha">
                        <input type="hidden" id="plan_academico_id_x" name="plan_academico_id">

                        <div class="table-responsive">
                            <table id="datatablen" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Estudiante</th>
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
        let action = '';

        $('#guardar').hide();

        $(document).on("change", "#plan_curso_id", function () {
            getAsignaturas();
            emptyTable();
        });

        $(document).on("change", "#plan_academico_id", function () {
            emptyTable();
        });

        $(document).on("change", "#fecha", function () {
            emptyTable();
        });

        $(document).on("submit", "#form", function () {
            $('#action').val(action);
            $('#date').val($('#fecha').val());
            $('#plan_academico_id_x').val($('#plan_academico_id option:selected').val());
        });

        $(document).on("click", "#generar", function () {

            $.ajax({
                type: "GET",
                url: `/check-calendario-academico`,
                data: {
                    fecha: $('#fecha').val(),
                },
            })
                .done(function (response) {

                    if (response === 'available') {
                        var today = new Date($('#fecha').val());

                        if (today.getDay() == 6 || today.getDay() == 0) {
                            toastr.error('La fecha no esta disponible')
                        } else {
                            let planCurso = $('#plan_curso_id').val();
                            let planAcademico = $('#plan_academico_id').val();
                            let fecha = $('#fecha').val();

                            if (planCurso && planAcademico && fecha) {
                                updateTableData();
                                $('#guardar').fadeIn();

                            }

                            if (!planCurso || !planAcademico || !fecha) {

                                toastr.error('Seleccione todos los campos')
                            }
                        }
                    } else {
                        toastr.error('Esta fecha no esta disponible')
                    }
                })
                .fail(function (response) {
                    toastr.error(DEFAULT_ERROR_RESPONSE);
                });

        });

        function emptyTable() {
            $('tbody tr').empty();
        }

        let flag = false;

        function getAsignaturas() {
            $.ajax({
                type: "GET",
                url: '/procesos/documentales/asistencias/get/asignaturas',
                data: {
                    id: $('#plan_curso_id option:selected').val(),
                }
            }).done(function (data) {
                let elementAsignatura = $('#plan_academico_id');

                data.forEach(element => {
                    elementAsignatura.append(`<option value="${element.id}">${element.asignatura.nombre}</option>`);
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
                    url: "/procesos/documentales/asistencias/get/inscripciones",
                    data: {
                        plan_curso_id: $('#plan_curso_id option:selected').val(),
                        plan_academico_id: $('#plan_academico_id option:selected').val(),
                        fecha: $('#fecha').val(),
                    },
                    dataSrc: ""
                },
                columns: [{
                    "data": null,
                    "render": function (data, type, row) {
                        if (!data.fecha) {
                            action = 'store';
                            return `
                                <td>
                                    ${data.estudiante.nombre} ${data.estudiante.apellido}
                                    <input type="hidden" name="inscripcion_id[]" value="${data.id}"
                                </td>
                            `;
                        }

                        if (data.fecha) {
                            action = 'update';
                            console.log(data);
                            return `
                                <td>
                                    ${data.inscripcion.estudiante.nombre} ${data.inscripcion.estudiante.apellido}
                                    <input type="hidden" name="inscripcion_id[]" value="${data.inscripcion.id}"
                                </td>
                            `;
                        }
                    },
                },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            if (!data.fecha) {
                                action = 'store';

                                return `
                                <td class="status-Activo">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="estado[${data.id}]" id="estadoa${data.id}" value="Presente" checked>
                                        <label class="btn btn-outline-primary" for="estadoa${data.id}">Presente</label>

                                        <input type="radio" class="btn-check" name="estado[${data.id}]" id="estadob${data.id}" value="Ausente">
                                        <label class="btn btn-outline-primary" for="estadob${data.id}">Ausente</label>
                                    </div>
                                </td>
                            `;
                            }

                            if (data.fecha) {
                                action = 'update';

                                return `
                                <td class="status-Activo">
                                    <input type="hidden" name="asistencia_id[]" value="${data.id}">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="estado[${data.inscripcion.id}]" id="estadoa${data.inscripcion.id}" value="Presente" ${(data.estado == 'Presente') ? 'checked' : ''}>
                                        <label class="btn btn-outline-primary" for="estadoa${data.inscripcion.id}">Presente</label>

                                        <input type="radio" class="btn-check" name="estado[${data.inscripcion.id}]" id="estadob${data.inscripcion.id}" value="Ausente" ${(data.estado == 'Ausente') ? 'checked' : ''}>
                                        <label class="btn btn-outline-primary" for="estadob${data.inscripcion.id}">Ausente</label>
                                    </div>
                                </td>
                            `;
                            }
                        },
                    },
                ]
            });

        }
    </script>
@endsection