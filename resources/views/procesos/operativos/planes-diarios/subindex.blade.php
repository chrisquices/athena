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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="actions">Acciones</th>
                                <th>Fecha</th>
                                <th>Contenido desarrollado </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($planes_diarios_detalles as $detalle)
                                <tr>
                                    <td>
                                        <a href="{{ route('planes-diarios-show', ['plan_diario_detalle' => $detalle->id, 'plan_diario' => $detalle->plan_diario_id]) }}"
                                            class="btn btn-sm btn-primary me-1">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <td>{{ $detalle->fecha }}</td>
                                    <td>{{ $detalle->contenido_desarrollado }}</td>
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
