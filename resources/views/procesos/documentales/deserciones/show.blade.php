@section('title', 'Deserciones')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Inscripcion</label>
                        <p>
                            {{ $desercion->inscripcion->estudiante->nombre }}
                            {{ $desercion->inscripcion->estudiante->apellido }}
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Causa</label>
                        <p>{{ $desercion->causa->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-6">
                        <label for="area_id" class="form-label">Fecha</label>
                        <p>{{ $desercion->fecha ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>

                    <div class="col-lg-12">
                        <label for="area_id" class="form-label">Observacion</label>
                        <p>{{ $desercion->observacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('deserciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection