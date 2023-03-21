@section('title', 'Requisitos de Inscripción')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Plan de Curso</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($planes_cursos as $plan_curso)
                            <tr>
                                <td>
                                    {{ $plan_curso->sede->acronimo }} |
                                    {{ $plan_curso->grado->nombre }}
                                    {{ $plan_curso->seccion }}
                                    {{ $plan_curso->turno }} |
                                    {{ $plan_curso->bachillerato->nombre ?? 'SB' }}
                                </td>
                                <td>
                                    <a href="{{ route('requisitos-inscripciones-print', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1" target="_blank">
                                        <i class="fa fa-print"></i>
                                    </a>

                                    <a href="{{ route('requisitos-inscripciones-show', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('requisitos-inscripciones-edit', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection