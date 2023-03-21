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
                            <label for="contrato_id" class="form-label">Contrato</label>
                            <select name="contrato_id" id="contrato_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un contrato</option>
                                @foreach($contratos as $contrato)
                                    <option value="{{ $contrato->contrato->id }}" @if($count==1) selected @endif>
                                        Contrato N° {{ $contrato->contrato-> id }}
                                        - {{ $contrato->contrato->asignatura->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <label for="reemplazante_id" class="form-label">Reemplazante</label>
                            <select name="reemplazante_id" id="reemplazante_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un reemplazante</option>
                                @foreach($reemplazantes as $reemplazante)
                                    <option value="{{ $reemplazante->id }}">{{ $reemplazante->nombre }} {{ $reemplazante->apellido }}</option>
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
                                <th>Dia</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th class="actions">Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="/procesos/operativos/asistencias/check" method="POST" id="form" hidden>
        @csrf
        @method('POST')

        <input type="text" name="hcontrato_id" id="hcontrato_id">
        <input type="text" name="hhorario_detalle_id" id="hhorario_detalle_id">
        <input type="text" name="hreemplazante_id" id="hreemplazante_id">
    </form>

@endsection


@section('scripts')
    <script>
        $(document).on("change", "#contrato_id", function () {
            getHorarios($('#contrato_id option:selected').val());
        });

        function submitForm(contrato_id, horario_detalle_id) {
            $('#hcontrato_id').val(contrato_id);
            $('#hhorario_detalle_id').val(horario_detalle_id);
            $('#hreemplazante_id').val($('#reemplazante_id option:selected').val());

            $('#form').submit();
        }

        function getHorarios() {
            $('#datatable').DataTable({
                destroy: true,
                language: SPANISH,
                lengthMenu: [
                    [30, 60, 90, -1],
                    [30, 60, 90],
                ],
                paging: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                searching: false,
                dom: 'l<"toolbar">frtip',
                ajax: {
                    type: "GET",
                    url: `/procesos/operativos/asistencias/get/horarios`,
                    data: {
                        id: $('#contrato_id option:selected').val()
                    },
                    dataSrc: ""
                },
                columns: [
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                            ${data.horario.plan_curso.sede.acronimo} |
                            ${data.horario.plan_curso.grado.nombre}
                            ${data.horario.plan_curso.seccion}
                            ${data.horario.plan_curso.turno} |
                            ${(data.horario.plan_curso.malla_curricular.bachillerato.acronimo)
                                ? data.horario.plan_curso.malla_curricular.bachillerato.acronimo
                                : 'SB'}
                        `;
                        },
                    },
                    {
                        "data": "horario.dia"
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return new Date().toISOString().slice(0, 10);
                        },
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `${data.hora_desde} - ${data.hora_hasta}`;
                        },
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                                <button class="btn btn-sm btn-primary me-1 btn-confirmation" onclick="submitForm(${data.contrato_id}, ${data.id})">
                                    <i class="fa fa-check"></i>
                                </button>
                            `;
                        },
                    },
                ]
            });
        }


    </script>

    @if($count == 1)
        <script>
            getHorarios($('#contrato_id option:selected').val());
        </script>
    @endif
@endsection