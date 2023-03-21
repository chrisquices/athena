@section('title', 'Contratos')
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
                                <th>Docente</th>
                                <th>Asignatura</th>
                                <th>Salario</th>
                                <th>Fecha de Inicio</th>
                                <th class="status">Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($contratos as $contrato)
                                <tr>
                                    <td>{{ $contrato->postulante->nombre }} {{ $contrato->postulante->apellido }}</td>
                                    <td>{{ $contrato->asignatura->nombre }}</td>
                                    <td>{{ number_format($contrato->salario, 0, ',', '.') }} Gs.</td>
                                    <td>{{ $contrato->fecha_inicio }}</td>
                                    <td class="status-{{ $contrato->estado }}">
                                        <i class="fa fa-check-circle me-1"></i>
                                        {{ $contrato->estado }}
                                    </td>
                                    <td>
                                        <a href="{{ route('contratos-print', ['contrato' => $contrato->id]) }}"
                                            class="btn btn-sm btn-primary me-1">
                                            <i class="fa fa-print"></i>
                                        </a>

                                         <a href="{{ route('contratos-anull', ['contrato' => $contrato->id]) }}"
                                            class="btn btn-sm btn-primary me-1">
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
