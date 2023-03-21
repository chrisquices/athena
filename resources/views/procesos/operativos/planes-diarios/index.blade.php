@section('title', 'Planes Diarios')
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
                            <label for="contrato_id" class="form-label">Contrato ID</label>
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
                                <th>Plan de Curso</th>
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
                    url: "/procesos/operativos/planes-diarios/get/planes-diarios/x",
                    data: {
                        id: $('#contrato_id option:selected').val()
                    },
                    dataSrc: ""
                },
                columns: [
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            console.log(data.plan_curso.malla_curricular.bachillerato);
                            return `
                                ${data.plan_curso.sede.acronimo} |
                                ${data.plan_curso.grado.nombre}
                                ${data.plan_curso.seccion}
                                ${data.plan_curso.turno} |
                                ${data.plan_curso.malla_curricular.bachillerato.nombre ?? 'SB' }
                            `;
                        },
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `
                                <a href="/procesos/operativos/planes-diarios/${data.id}/print/x" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-print"></i>
                                </a>
                                <a href="/procesos/operativos/planes-diarios/${data.id}" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-search"></i>
                                </a>
                            `;
                        }
                    },
                ]
            });
        }
    </script>
@endsection
