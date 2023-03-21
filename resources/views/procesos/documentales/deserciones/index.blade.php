@section('title', 'Deserciones')
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
                                <th>Estudiante</th>
                                <th>Causa</th>
                                <th>Fecha</th>
                                <th class="status">Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deserciones as $desercion)
                            <tr>
                                <td>
                                    {{ $desercion->inscripcion->estudiante->nombre }}
                                    {{ $desercion->inscripcion->estudiante->apellido }}
                                </td>
                                <td>{{ $desercion->causa->nombre }}</td>
                                <td>{{ $desercion->fecha }}</td>
                                <td>
                                    <div class="status-{{ $desercion->estado }}">
                                        <i class=" fa fa-check-circle me-1"></i>
                                        {{ $desercion->estado }}
                                    </div>
                                </td>
                                <td>
                                    <a href="/procesos/documentales/deserciones/{{ $desercion->id }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    @if ($desercion->estado == 'Activo')
                                    <a href="/procesos/documentales/deserciones/{{ $desercion->id }}/anull" class="btn btn-sm btn-primary me-1 btn-confirmation">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                    @endif
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