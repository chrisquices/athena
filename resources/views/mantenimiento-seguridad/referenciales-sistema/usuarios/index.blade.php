@section('title', 'Usuarios')
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
                                <th>Rol</th>
                                <th>Nombre y Apellido</th>
                                <th>Correo Electrónico</th>
                                <th>Verificado</th>
                                <th>Intentos Fallidos</th>
                                <th>Estado</th>
                                <th class="actions">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->name ?? '-' }} {{ $user->lastname ?? '-' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if($user->verified) Si @else No @endif</td>
                                <td>{{ $user->failed_attempt }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="{{ route('usuarios-reset', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
                                        <i class="fa fa-redo"></i>
                                    </a>

                                    <a href="{{ route('usuarios-show', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <a href="{{ route('usuarios-edit', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a href="{{ route('usuarios-assign', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1">
                                        <i class="fa fa-plus"></i>
                                    </a>

{{--                                    <a href="{{ route('usuarios-unassign', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1">--}}
{{--                                        <i class="fa fa-minus"></i>--}}
{{--                                    </a>--}}

                                    @if ($user->status == 'Activo')
                                    <a href="{{ route('usuarios-block', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
                                        <i class="fa fa-lock"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('usuarios-unblock', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
                                        <i class="fa fa-unlock"></i>
                                    </a>
                                    @endif

                                    <a href="{{ route('usuarios-delete', ['user' => $user->id]) }}" class="btn btn-sm btn-primary me-1" onclick="return confirm('Confirmar');">
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
