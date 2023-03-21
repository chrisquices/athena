@section('title', 'Permisos')
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
                            <label for="area_id" class="form-label">Contrato</label>
                            <p>{{ $permiso->contrato_id ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Causa</label>
                            <p>{{ $permiso->causa->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Fecha Ausente</label>
                            <p>{{ $permiso->asistencia_operativo->fecha ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Estado</label>
                            <p>{{ $permiso->estado ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-12">
                            <label for="area_id" class="form-label">Observacion</label>
                            <p>{{ $permiso->observacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('permisos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
