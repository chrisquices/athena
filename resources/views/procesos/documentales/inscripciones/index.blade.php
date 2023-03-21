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
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <label for="plan_curso" class="form-label">Plan de Curso</label>
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
                                <th>Estudiante</th>
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
    $(document).on("change", "#plan_curso_id", function() {
        updateTableData();
        addAddButtonToTable();
    });

    function updateTableData() {
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
                url: "/procesos/documentales/inscripciones/get/inscripciones",
                data: {
                    id: $('#plan_curso_id option:selected').val()
                },
                dataSrc: ""
            },
            columns: [{
                    "data": null,
                    "render": function(data, type, row) {
                        return `${data.estudiante.nombre} ${data.estudiante.apellido}`;
                    },
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
                                <a href="/procesos/documentales/inscripciones/${data.id}/print" class="btn btn-sm btn-primary me-1" target="_blank">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="/procesos/documentales/inscripciones/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>

                                <a href="/procesos/documentales/inscripciones/${data.id}/edit" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="/procesos/documentales/inscripciones/${data.id}/anull" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                    <i class="fa fa-ban"></i>
                                </a>

                            `;
                        }
                        if (data.estado != 'Activo') {
                            return `
                                <a href="/procesos/documentales/inscripciones/${data.id}/print" class="btn btn-sm btn-primary me-1" target="_blank">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="/procesos/documentales/inscripciones/${data.id}" class="btn btn-sm btn-primary me-1">
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