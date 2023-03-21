@section('title', 'Planes Académicos')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_academico->plan_curso->sede->nombre }} |
                                {{ $plan_academico->plan_curso->grado->nombre }}
                                {{ $plan_academico->plan_curso->seccion }}
                                {{ $plan_academico->plan_curso->turno }} |
                                {{ $plan_academico->plan_curso->bachillerato->acronimo ?? 'SB' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Asignatura</label>
                            <p>{{ $plan_academico->asignatura->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Modalidad</label>
                            <p>{{ $plan_academico->modalidad ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Alcances</label>
                            <p>{!! $plan_academico->alcances !!}</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Contenidos</label>
                            <p>{!! $plan_academico->alcances !!}</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Actividades</label>
                            <p>{!! $plan_academico->alcances !!}</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">Instrumentos</label>
                            <p>{!! $plan_academico->alcances !!}</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('planes-academicos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection