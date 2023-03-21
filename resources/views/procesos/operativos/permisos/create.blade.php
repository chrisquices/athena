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
                <form action="{{ route('permisos-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="contrato_id" class="form-label">Contrato</label>
                            <select name="contrato_id" id="contrato_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un contrato</option>
                                @foreach($contratos as $contrato)
                                <option value="{{ $contrato->id }}">
                                    Contrato N° {{ $contrato-> id }} -
                                    {{ $contrato->postulante->nombre }}
                                    {{ $contrato->postulante->apellido }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="fecha" class="form-label">Fecha a Ausentarse</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" rows="5">
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="causa_id" class="form-label">Causa</label>
                            <select name="causa_id" id="causa_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una opcion</option>
                                @foreach ($causas as $causa)
                                <option value="{{ $causa->id }}">{{ $causa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="observacion" class="form-label">Observacion</label>
                            <textarea type="text" class="form-control" id="observacion" name="observacion" rows="5"></textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Horarios</label>
                            <ul id="columns" class="list-group">

                            </ul>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('permisos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
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
    $(document).on("change", "#contrato_id, #fecha", function() {
        let contratoId = $('#contrato_id option:selected').val();
        let fecha = $('#fecha').val();

        if (contratoId && fecha) {
            getHorarios(contratoId, fecha);
        } else {
            toastr.error('Seleccione un contrato y una fecha');
        }
    });

    function getHorarios(contratoId, fecha) {
        $.ajax({
                type: "GET",
                url: `/procesos/operativos/permisos/get/horarios`,
                data: {
                    id: contratoId,
                    fecha: fecha,
                },
            })
            .done(function(response) {
                console.log(response);
                elementHorario = $('#columns');

                elementHorario.empty();

                response.forEach(element => {
                    elementHorario.append(`
                        <li class="list-group-item">
                            <div class="form-check">
                                <input id="horario${element.id}" name="horario[${element.id}]" class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label" for="horario${element.id}">
                                    ${element.horario.plan_curso.sede.acronimo} |
                                    ${element.horario.plan_curso.grado.nombre}
                                    ${element.horario.plan_curso.seccion}
                                    ${element.horario.plan_curso.turno} |
                                    ${(element.horario.plan_curso.malla_curricular.bachillerato.acronimo)
                                    ? element.horario.plan_curso.malla_curricular.bachillerato.acronimo
                                    : 'SB'} |
                                    ${element.asignatura.nombre} |
                                    ${element.horario.dia} |
                                    ${ element.hora_desde } - ${ element.hora_hasta }
                                </label>
                            </div>
                        </li>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection
