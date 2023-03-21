@section('title', 'Reemplazantes')
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
                            <p>{{ $reemplazante->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Apellido</label>
                            <p>{{ $reemplazante->apellido ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Teléfono</label>
                            <p>{{ $reemplazante->telefono ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Direccion</label>
                            <p>{{ $reemplazante->direccion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('reemplazantes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
