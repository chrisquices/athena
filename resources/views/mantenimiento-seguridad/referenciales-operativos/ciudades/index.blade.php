@section('title', 'Ciudades')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Operativos')

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
                                <th>Acrónimo</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($ciudades as $ciudad)
                            <tr>
                                <td>{{ $ciudad->nombre }}</td>
                                <td>{{ $ciudad->acronimo }}</td>
                                <td>
                                    <a href="{{ route('ciudades-show', ['ciudad' => $ciudad->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('ciudades-edit', ['ciudad' => $ciudad->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('ciudades-delete', ['ciudad' => $ciudad->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar')">
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