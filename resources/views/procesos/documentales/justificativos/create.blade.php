@section('title', 'Justificativos')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('justificativos-documental-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="inscripcion_id" class="form-label">Inscripción</label>
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

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="asistencia_documental_id" class="form-label">Fecha Ausente</label>
                            <select name="asistencia_documental_id" id="asistencia_documental_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una ausencia</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="causa_id" class="form-label">Causa</label>
                            <select name="causa_id" id="causa_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una causa</option>
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
                            <a href="{{ route('justificativos-documental-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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
    $(document).on("change", "#inscripcion_id", function() {
        getAusencias($('#inscripcion_id option:selected').val());
    });

    function getAusencias(inscripcionId) {
        $.ajax({
                type: "GET",
                url: `/procesos/documentales/justificativos/get/ausencias`,
                data: {
                    id: inscripcionId,
                },
            })
            .done(function(response) {
                elementAusencia = $('#asistencia_documental_id');

                elementAusencia.empty();

                elementAusencia.append(`
                    <option value="" selected disabled>Seleccione una ausencia</option>
                `);

                response.forEach(element => {
                    elementAusencia.append(`
                        <option value="${element.id}">${element.fecha} - ${element.plan_academico.asignatura.nombre}</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection