@section('title', 'Guardianes')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Documentales')

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
                                <th>Número de Documento</th>
                                <th>Ciudad</th>
                                <th>Teléfono</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($guardianes as $guardian)
                            <tr>
                                <td>{{ $guardian->nombre }} {{ $guardian->apellido }}</td>
                                <td>{{ $guardian->documento_numero }}</td>
                                <td>{{ $guardian->ciudad->nombre }}</td>
                                <td>{{ $guardian->telefono }}</td>
                                <td>
                                    <a href="{{ route('guardianes-show', ['guardian' => $guardian->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('guardianes-edit', ['guardian' => $guardian->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('guardianes-delete', ['guardian' => $guardian->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar')">
                                        <i class="fa fa-trash"></i>
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