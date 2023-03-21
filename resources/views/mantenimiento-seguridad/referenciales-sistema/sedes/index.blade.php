@section('title', 'Sedes')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Sistema')

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
                                <th>Direccion</th>
                                <th>Teléfono</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sedes as $sede)
                            <tr>
                                <td>{{ $sede->nombre }}</td>
                                <td>{{ $sede->acronimo }}</td>
                                <td>{{ $sede->telefono }}</td>
                                <td>{{ $sede->direccion }}</td>
                                <td>
                                    <a href="{{ route('sedes-show', ['sede' => $sede->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('sedes-edit', ['sede' => $sede->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('sedes-delete', ['sede' => $sede->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
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