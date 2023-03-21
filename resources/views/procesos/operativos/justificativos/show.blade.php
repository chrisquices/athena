@section('title', 'Justificativos')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Contrato / Docente</label>
                        <p>
                            Contrato N {{ $justificativo_operativo->contrato->id }} -
                            {{ $justificativo_operativo->contrato->postulante->nombre }}
                            {{ $justificativo_operativo->contrato->postulante->apellido }}
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Fecha Ausente</label>
                        <p>{{ $justificativo_operativo->asistencia_operativo->fecha ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Causa</label>
                        <p>{{ $justificativo_operativo->causa->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-12">
                        <label for="area_id" class="form-label">Observacion</label>
                        <p>{{ $justificativo_operativo->observacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('justificativos-operativo-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection