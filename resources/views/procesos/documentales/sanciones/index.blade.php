@section('title', 'Sanciones')
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
                        <label for="inscripcion" class="form-label">Inscripción</label>
                        <select name="inscripcion_id" id="inscripcion_id" class="form-control select2">
                            <option value="" selected disabled>Seleccione una inscripcion</option>
                            @foreach ($inscripciones as $inscripcion)
                            <option value="{{ $inscripcion->id }}">
                                {{ $inscripcion->estudiante->documento_numero }} -
                                {{ $inscripcion->estudiante->nombre }}
                                {{ $inscripcion->estudiante->apellido }}
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
                                <th>Causa</th>
                                <th>Fecha</th>
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
    $(document).on("change", "#inscripcion_id", function() {
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
                url: "/procesos/documentales/sanciones/get/sanciones",
                data: {
                    id: $('#inscripcion_id option:selected').val(),
                },
                dataSrc: ""
            },
            columns: [{
                    "data": "tipo"
                },
                {
                    "data": "causa.nombre"
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return data.created_at.toLocaleString();
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
                                <a href="/procesos/documentales/sanciones/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>

                                <a href="/procesos/documentales/sanciones/${data.id}/edit" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="/procesos/documentales/sanciones/${data.id}/anull" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                    <i class="fa fa-ban"></i>
                                </a>
                            `;
                        }
                        if (data.estado != 'Activo') {
                            return `
                                <a href="/procesos/documentales/sanciones/${data.id}" class="btn btn-sm btn-primary me-1 btn-confirmation">
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