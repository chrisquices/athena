@section('title', 'Planes Diarios')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('planes-diarios-store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="contrato_id" class="form-label">Contrato</label>
                                <select name="contrato_id" id="contrato_id" class="form-control select2">
                                    @foreach ($contratos as $contrato)
                                        <option value="{{ $contrato->id }}">
                                            Contrato N° {{ $contrato->id }} -
                                            C.I. {{ $contrato->postulante->documento_numero }}
                                            {{ $contrato->postulante->nombre }}
                                            {{ $contrato->postulante->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                                <select name="plan_curso_id" id="plan_curso_id" class="form-control select2">
                                    <option value="" selected disabled>Seleccione un plan de curso</option>
                                    @foreach ($planes_cursos as $plan_curso)
                                        <option value="{{ $plan_curso->id }}">
                                            {{ $plan_curso->sede->acronimo }} |
                                            {{ $plan_curso->grado->nombre }}
                                            {{ $plan_curso->seccion }}
                                            {{ $plan_curso->turno }} |
                                            {{ $plan_curso->bachillerato->nombre ?? 'SB' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('planes-diarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection