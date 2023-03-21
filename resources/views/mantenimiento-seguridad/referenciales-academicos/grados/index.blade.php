@section('title', 'Grados')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Académicos')

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
                                <th>Nombre</th>
                                <th>Nombre Alternativo</th>
                                <th>Nivel</th>
                                <th>Nivel (acrónimo)</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($grados as $grado)
                            <tr>
                                <td>{{ $grado->nombre }}</td>
                                <td>{{ $grado->nombre_alternativo }}</td>
                                <td>{{ $grado->nivel }}</td>
                                <td>{{ $grado->nivel_acronimo }}</td>
                                <td>
                                    <a href="{{ route('grados-show', ['grado' => $grado->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('grados-edit', ['grado' => $grado->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('grados-delete', ['grado' => $grado->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar')">
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