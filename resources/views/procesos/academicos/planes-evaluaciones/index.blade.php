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

                    <!-- <div class="col-lg-3 col-md-6 col-sm-12">
                        <label for="tipo_evaluacion_id" class="form-label">Tipo de Evaluacion</label>
                        <select name="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control select2">
                            <option value="" selected disabled>Seleccione un tipo de evaluacion</option>
                        </select>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tema</th>
                                <th>Asignatura</th>
                                <th>Tipo de Evaluacion</th>
                                <th class="status">Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).on("change", "#plan_curso_id, #tipo_evaluacion_id", function() {
        get();
        addAddButtonToTable();
        loadPlanesAcademicos();
        // loadTiposEvaluaciones();
    });

    $(document).on("change", "#plan_academico_id", function() {
        get();
        addAddButtonToTable();
    });


    // function loadTiposEvaluaciones() {
    //     $.ajax({
    //             type: "GET",
    //             url: `/procesos/academicos/planes-evaluaciones/get/tipos-evaluaciones`,
    //         })
    //         .done(function(response) {

    //             elementTipoEvaluacion = $('#tipo_evaluacion_id');

    //             elementTipoEvaluacion.empty();

    //             elementTipoEvaluacion.append(`
    //                 <option value="" selected disabled>Seleccione una asignatura</option>
    //                 <option value="">Todos</option>
    //             `);

    //             response.forEach(element => {
    //                 elementTipoEvaluacion.append(`
    //                     <option value="${element.id}">${element.nombre}</option>
    //                 `);
    //             });

    //         })
    //         .fail(function(response) {
    //             toastr.error(DEFAULT_ERROR_RESPONSE);
    //         });
    // }

    function loadPlanesAcademicos() {
        $.ajax({
                type: "GET",
                url: `/procesos/academicos/planes-evaluaciones/get/planes-academicos`,
                data: {
                    id: $('#plan_curso_id option:selected').val(),
                },
            })
            .done(function(response) {
                console.log(response);
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

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }

    function get() {
        $('#datatable').DataTable({
            destroy: true,
            language: SPANISH,
            lengthMenu: [
                [30, 60, 90, -1],
                [30, 60, 90],
            ],
            dom: 'l<"toolbar">frtip',
            ajax: {
                type: "GET",
                url: "/procesos/academicos/planes-evaluaciones/get/planes-evaluaciones",
                data: {
                    plan_curso_id: $('#plan_curso_id option:selected').val(),
                    plan_academico_id: $('#plan_academico_id option:selected').val(),
                    tipo_evaluacion_id: $('#tipo_evaluacion_id option:selected').val(),
                },
                dataSrc: ""
            },
            drawCallback: function(settings) {
                addBtnConfirmation();
            },
            columns: [{
                    "data": "tema"
                },
                {
                    "data": "plan_academico.asignatura.nombre"
                },
                {
                    "data": "tipo_evaluacion.nombre"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                            <div class="status-${data.estado}">
                                <i class=" fa fa-check-circle me-1"></i>
                                ${data.estado}
                            </div>
                        `;
                    },
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (data.estado == 'Activo') {
                            return `
                                <a href="/procesos/academicos/planes-evaluaciones/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>

                                <a href="/procesos/academicos/planes-evaluaciones/${data.id}/edit" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="/procesos/academicos/planes-evaluaciones/${data.id}/anull" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                    <i class="fa fa-ban"></i>
                                </a>
                            `;
                        }

                        if (data.estado != 'Activo') {
                            return `
                                <a href="/procesos/academicos/planes-evaluaciones/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>
                            `;
                        }
                    },
                },
            ]
        });
    }
</script>
@endsection