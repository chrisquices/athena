@section('title', 'Sanciones')
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
                        <label for="area_id" class="form-label">Inscripcion</label>
                        <p>
                            {{ $sancion->inscripcion->estudiante->nombre }}
                            {{ $sancion->inscripcion->estudiante->apellido }}
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Tipo</label>
                        <p>{{ $sancion->tipo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Causa</label>
                        <p>{{ $sancion->causa->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-12">
                        <label for="area_id" class="form-label">Observacion</label>
                        <p>{{ $sancion->observacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('sanciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection