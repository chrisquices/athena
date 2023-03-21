@section('title', 'Planes Diarios')
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
                            <p>
                                Contrato N° {{ $plan_diario_detalle->plan_diario->contrato->id }} -
                                C.I. {{ $plan_diario_detalle->plan_diario->contrato->postulante->documento_numero }}
                                {{ $plan_diario_detalle->plan_diario->contrato->postulante->nombre }}
                                {{ $plan_diario_detalle->plan_diario->contrato->postulante->apellido }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_diario_detalle->plan_diario->plan_curso->sede->nombre }} |
                                {{ $plan_diario_detalle->plan_diario->plan_curso->grado->nombre }}
                                {{ $plan_diario_detalle->plan_diario->plan_curso->seccion }}
                                {{ $plan_diario_detalle->plan_diario->plan_curso->turno }} |
                                {{ $plan_diario_detalle->plan_diario->plan_curso->bachillerato->acronimo ?? 'SB' }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label for="area_id" class="form-label">Fecha</label>
                            <p>{{ $plan_diario_detalle->fecha ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-12">
                            <label for="area_id" class="form-label">Contenido Desarrollado</label>
                            <p>{{ $plan_diario_detalle->contenido_desarrollado ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>

                        <div class="col-lg-12">
                            <label for="area_id" class="form-label">Observacion</label>
                            <p>{{ $plan_diario_detalle->observacion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('planes-diarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
