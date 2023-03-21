@section('title', 'Calendarios Academicos')
@section('level-1', 'Procesos')
@section('level-2', 'Academicos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div>
                            <label for="area_id" class="form-label">Ano</label>
                            <p>{{ $calendario_academico->ano }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label for="name" class="form-label">Nombre</label>
                            <p>{{ $calendario_academico->nombre }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="acronimo" class="form-label">Fecha</label>
                            <p>{{ $calendario_academico->fecha }}</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('calendarios-academicos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
