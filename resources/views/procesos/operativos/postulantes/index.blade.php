@section('title', 'Postulantes')
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
                                <th>Nombre y Apellido</th>
                                <th>Teléfono</th>
                                <th>Ciudad</th>
                                <th>Direccion</th>
                                <th class="actions">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($postulantes as $postulante)
                                <tr>
                                    <td>{{ $postulante->nombre }} {{ $postulante->apellido }}</td>
                                    <td>{{ $postulante->telefono }}</td>
                                    <td>{{ $postulante->ciudad->nombre }}</td>
                                    <td>{{ $postulante->direccion }}</td>
                                    <td>
                                        <a href="{{ route('postulantes-show', ['postulante' => $postulante->id]) }}"
                                           class="btn btn-sm btn-primary me-1">
                                            <i class="fa fa-search"></i>
                                        </a>

                                        <a href="{{ route('postulantes-edit', ['postulante' => $postulante->id]) }}"
                                           class="btn btn-sm btn-primary me-1">
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
