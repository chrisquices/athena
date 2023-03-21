@section('title', 'Reemplazantes')
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
                                <th>Direccion</th>
                                <th class="actions">Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($reemplazantes as $reemplazante)
                                <tr>
                                    <td>{{ $reemplazante->nombre }} {{ $reemplazante->apellido }}</td>
                                    <td>{{ $reemplazante->telefono }}</td>
                                    <td>{{ $reemplazante->direccion }}</td>
                                    <td>
                                        <a href="{{ route('reemplazantes-show', ['reemplazante' => $reemplazante->id]) }}"
                                           class="btn btn-sm btn-primary me-1">
                                            <i class="fa fa-search"></i>
                                        </a>

                                        <a href="{{ route('reemplazantes-edit', ['reemplazante' => $reemplazante->id]) }}"
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
