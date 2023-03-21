@section('title', 'Formularios 03')
@section('level-1', 'Procesos')
@section('level-2', 'Documentales')

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
                                            <a href="/procesos/documentales/formularios-03/{{ $plan_curso->id }}/print" class="btn btn-sm btn-primary me-1" target="_blank">
                                                <i class="fa fa-print"></i>
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

@section('scripts')
    <script>
        $("#datatable").DataTable({
            destroy: true,
            language: SPANISH,
            lengthMenu: [[30, 60, 90, -1], [30, 60, 90]],
        });
    </script>
@endsection
