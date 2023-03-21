@section('title', 'Requisitos de Inscripción')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_curso->sede->nombre }} |
                                {{ $plan_curso->grado->nombre }}
                                {{ $plan_curso->seccion }}
                                {{ $plan_curso->turno }} |
                                {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Requisitos de Inscripción</label>
                            <ul>
                                @foreach ($requisitos_inscripciones as $requisito_inscripcion)
                                <li>{{ $requisito_inscripcion->requisito->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('requisitos-inscripciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection