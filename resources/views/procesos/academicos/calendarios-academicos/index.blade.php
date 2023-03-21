@section('title', 'Calendarios Academicos')
@section('level-1', 'Procesos')
@section('level-2', 'Academicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <label for="ano" class="form-label">Ano</label>
                        <select name="ano" id="ano" class="form-control select2">
                            @foreach ($anos as $ano)
                                <option value="{{ $ano }}">{{ $ano }}</option>
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
                                <th>Ano</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($calendarios_academicos as $calendario_academico) <tr>
                                <td>{{ $calendario_academico->ano }}</td>
                                <td>{{ $calendario_academico->nombre }}</td>
                                <td>{{ $calendario_academico->fecha }}</td>
                                <td>
                                    <a href="{{ route('calendarios-academicos-show', ['calendario_academico' => $calendario_academico->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('calendarios-academicos-edit', ['calendario_academico' => $calendario_academico->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('calendarios-academicos-delete', ['calendario_academico' => $calendario_academico->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).on("change", "#ano", function() {
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
                    url: "/procesos/academicos/calendarios-academicos/get/calendarios-academicos",
                    data: {
                        ano: $('#ano option:selected').val()
                    },
                    dataSrc: ""
                },
                columns: [
                    {
                        "data": "ano"
                    },
                    {
                        "data": "nombre"
                    },
                    {
                        "data": "fecha"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `
                            <a href="/procesos/academicos/calendarios-academicos/${data.id}" class="btn btn-sm btn-primary me-1">
                                <i class="fa fa-search"></i>
                            </a>

                            <a href="/procesos/academicos/calendarios-academicos/${data.id}/edit" class="btn btn-sm btn-primary me-1">
                                <i class="fa fa-pen"></i>
                            </a>

                            <a href="/procesos/academicos/calendarios-academicos/${data.id}/delete" class="btn btn-sm btn-primary me-1">
                                <i class="fa fa-trash"></i>
                            </a>
                        `;
                        },
                    },
                ]
            });
        }
    </script>
@endsection