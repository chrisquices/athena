@section('title', 'Estudiantes')
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
                                <th>Guardián</th>
                                <th>Nombre y Apellido</th>
                                <th>Número de Documento</th>
                                <th>Nacionalidad</th>
                                <th>Fecha de Nacimiento</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->guardian->nombre }} {{ $estudiante->guardian->apellido }}</td>
                                <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                                <td>{{ $estudiante->documento_numero }}</td>
                                <td>{{ $estudiante->nacionalidad->nombre }}</td>
                                <td>{{ $estudiante->fecha_nacimiento }}</td>
                                <td>
                                    <a href="{{ route('estudiantes-show', ['estudiante' => $estudiante->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('estudiantes-edit', ['estudiante' => $estudiante->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('estudiantes-delete', ['estudiante' => $estudiante->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar')">
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