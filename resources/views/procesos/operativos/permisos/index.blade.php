@section('title', 'Permisos')
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
                            <label for="name" class="form-label">Contrato ID</label>
                            <select name="contrato_id" id="contrato_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un contrato</option>

                                @foreach($contratos as $contrato)
                                    <option value="{{ $contrato->id }}">
                                        Contrato N° {{ $contrato->id }} -
                                        C.I. {{ $contrato->postulante->documento_numero }}
                                        {{ $contrato->postulante->nombre }}
                                        {{ $contrato->postulante->apellido }}
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
                                    <th>Fecha Ausente</th>
                                    <th>Fecha Presentada</th>
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
        $(document).on("change", "#contrato_id", function() {
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
                    url: "/procesos/operativos/permisos/get/permisos",
                    data: {
                        id: $('#contrato_id option:selected').val()
                    },
                    dataSrc: ""
                },
                columns: [
                    {
                        "data": "asistencia_operativo.fecha"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "estado"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            if (data.estado == 'Activo') {
                                return `
                                <a href="/procesos/operativos/permisos/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>

                                <a href="/procesos/operativos/permisos/${data.id}/anull" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-ban"></i>
                                </a>
                            `;
                            }

                            if (data.estado != 'Activo') {
                                return `
                                <a href="/procesos/operativos/permisos/${data.id}" class="btn btn-sm btn-primary me-1">
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
