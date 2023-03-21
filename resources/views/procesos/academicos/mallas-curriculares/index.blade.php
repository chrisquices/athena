@section('title', 'Mallas Curriculares')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th class="status">Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($mallas_curriculares as $malla_curricular)
                            <tr>
                                <td>{{ $malla_curricular->nombre }}</td>
                                <td>
                                    <div class="status-{{ $malla_curricular->estado }}">
                                        <i class=" fa fa-check-circle me-1"></i>
                                        {{ $malla_curricular->estado }}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('mallas-curriculares-print', ['malla_curricular' => $malla_curricular->id]) }}" class="btn btn-sm btn-primary me-1 btn-print" target="_blank">
                                        <i class="fa fa-print"></i>
                                    </a>

                                    @if ($malla_curricular->estado == 'Activo')
                                        <a href="{{ route('mallas-curriculares-anull', ['malla_curricular' => $malla_curricular->id]) }}" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                    @endif
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
                url: "/procesos/academicos/mallas-curriculares/reload-table",
                data: {
                    ano: $('#ano option:selected').val()
                },
                dataSrc: ""
            },
            columns: [{
                    "data": "nombre"
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
                                <a href="/procesos/academicos/mallas-curriculares/${data.id}/print" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-print"></i>
                                </a>

                                <a href="/procesos/academicos/mallas-curriculares/${data.id}/anull" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
                                    <i class="fa fa-ban"></i>
                                </a>
                            `;
                        }

                        if (data.estado != 'Activo') {
                            return `
                                <a href="/procesos/academicos/mallas-curriculares/${data.id}/print" class="btn btn-sm btn-primary me-1">
                                    <i class="fa fa-print"></i>
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