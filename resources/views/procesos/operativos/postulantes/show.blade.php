@section('title', 'Postulantes')
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
                            <label for="area_id" class="form-label">Nombre</label>
                            <p>{{ $postulante->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Apellido</label>
                            <p>{{ $postulante->apellido ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Teléfono</label>
                            <p>{{ $postulante->telefono ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Dirección</label>
                            <p>{{ $postulante->direccion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Tipo de Documento</label>
                            <p>{{ $postulante->documento_tipo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Número de Documento</label>
                            <p>{{ $postulante->documento_numero ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-12">
                            <label for="area_id" class="form-label">Rubros</label>
                            @foreach($postulante->asignatura_postulante as $asignatura_postulante)
                                <p>{{ $asignatura_postulante->asignatura->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('postulantes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
