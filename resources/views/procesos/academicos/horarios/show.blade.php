@section('title', 'Horarios de Clase')
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
                                {{ $plan_curso->sede->acronimo }} |
                                {{ $plan_curso->grado->nombre }}
                                {{ $plan_curso->seccion }}
                                {{ $plan_curso->turno }} |
                                {{ $plan_curso->bachillerata->acronimo ?? 'SB' }}
                            </p>
                        </div>
                    </div>

                    @foreach ($horarios as $horario)
                    <div class="col-lg-12">
                        <div>
                            <label for="area_id" class="form-label">{{ $horario->dia }}</label>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asignatura</th>
                                <th>Docente</th>
                                <th>Horario</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($horario->detalle as $detalle)
                            <tr>
                                <td>{{ $detalle->hora }}°</td>
                                <td>{{ $detalle->asignatura->nombre }}</td>
                                <td>{{ $detalle->asignatura->fff ?? '-'}}</td>
                                <td>{{ $detalle->hora_desde }} - {{ $detalle->hora_hasta }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @endforeach
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('horarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection