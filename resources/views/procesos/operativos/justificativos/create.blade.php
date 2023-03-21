@section('title', 'Justificativos')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('justificativos-operativo-store') }}" method="POST" autocomplete="off">
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
                            <label for="asistencia_id" class="form-label">Fecha Ausente</label>
                            <select name="asistencia_id" id="asistencia_id" class="form-control select2">
                                <option value="">Seleccione una ausencia</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="causa_id" class="form-label">Causas</label>
                            <select name="causa_id" id="causa_id" class="form-control select2">
                                <option value="">Seleccione una causa</option>
                                @foreach ($causas as $causa)
                                <option value="{{ $causa->id }}">{{ $causa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="observacion" class="form-label">Observacion</label>
                            <textarea type="text" class="form-control" id="observacion" name="observacion" rows="5"></textarea>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('justificativos-operativo-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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
    $(document).on("change", "#contrato_id", function() {
        let contratoId = $('#contrato_id option:selected').val();

        getAusencias(contratoId);
    });

    function getAusencias(contratoId) {
        $.ajax({
                type: "GET",
                url: `/procesos/operativos/justificativos/get/ausencias`,
                data: {
                    id: contratoId,
                },
            })
            .done(function(response) {
                console.log(response);
                elementHorario = $('#asistencia_id');

                elementHorario.empty();

                elementHorario.append(`
                        <option value="" selected disabled>Seleccione una ausencia</option>
                    `);

                response.forEach(element => {
                    elementHorario.append(`
                            <option value="${element.id}">${element.fecha} | Hora ${element.horario_detalle.hora} |
                               ${element.horario_detalle.hora_desde} - ${element.horario_detalle.hora_hasta}</option>
                        `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection
