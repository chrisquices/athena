@section('title', 'Planes de Cursos')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    @if (auth()->user()->role == 'Administrador')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <a href="/procesos/academicos/planes-cursos/finalizar" type="submit" class="btn btn-finalize btn-primary btn-confirmation"><i class="fa fa-check-circle me-2"></i>Finalizar Año Lectivo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th class="status">Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($planes_cursos as $plan_curso)
                            <tr>
                                <td>
                                    {{ $plan_curso->sede->acronimo }}
                                    {{ $plan_curso->grado->nombre }}
                                    {{ $plan_curso->turno }}
                                    {{ $plan_curso->seccion }} |
                                    {{ $plan_curso->malla_curricular->bachillerato->nombre }}
                                </td>
                                <td class="status-{{ $plan_curso->estado }}">
                                    <i class="fa fa-check-circle me-1"></i>
                                    {{ $plan_curso->estado }}
                                </td>
                                <td>
                                    <a href="{{ route('planes-cursos-print', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1" target="_blank">
                                        <i class="fa fa-print"></i>
                                    </a>

                                    <a href="{{ route('planes-cursos-show', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('planes-cursos-edit', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('planes-cursos-anull', ['plan_curso' => $plan_curso->id]) }}" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                        <i class="fa fa-ban"></i>
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