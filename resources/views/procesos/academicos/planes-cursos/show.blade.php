@section('title', 'Planes de Cursos')
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
                            <label for="sede_id" class="form-label">Sede</label>
                            <p>
                                <a href="{{ route('sedes-show', ['sede' => $plan_curso->sede_id]) }}">
                                    {{ $plan_curso->sede->nombre  ?? env('DEFAULT_EMPTY_TEXT') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="malla_curricular_id" class="form-label">Malla Curricular</label>
                            <p>
                                <a href="{{ route('mallas-curriculares-print', ['malla_curricular' => $plan_curso->malla_curricular_id]) }}">
                                    {{ $plan_curso->malla_curricular->nombre }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="grado_id" class="form-label">Grado</label>
                            <p>
                                <a href="{{ route('grados-show', ['grado' => $plan_curso->grado_id]) }}">
                                    {{ $plan_curso->grado->nombre  ?? env('DEFAULT_EMPTY_TEXT') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="turno" class="form-label">Turno</label>
                            <p>{{ $plan_curso->turno ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="seccion" class="form-label">Sección</label>
                            <p>{{ $plan_curso->seccion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="promedio_requerido" class="form-label">Promedio Requerido</label>
                            <p>{{ $plan_curso->promedio_requerido ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <p>{{ $plan_curso->fecha_inicio ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
                            <p>{{ $plan_curso->fecha_fin ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('planes-cursos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection