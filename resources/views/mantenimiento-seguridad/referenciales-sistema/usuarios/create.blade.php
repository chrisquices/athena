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
                <form action="{{ route('usuarios-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="role" class="form-label">Rol</label>
                                <select name="role" id="role" class="form-control select2">
                                    <option value="" disabled selected>Seleccione un rol</option>
                                    <option value="Administrador" @if(old('role')=='Administrador' ) selected @endif>Administrador</option>
                                    <option value="Director" @if(old('role')=='Director' ) selected @endif>Director</option>
                                    <option value="Secretario" @if(old('role')=='Secretario' ) selected @endif>Secretario</option>
                                    <option value="Docente" @if(old('role')=='Docente' ) selected @endif>Docente</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" name="name" class="form-control" type="text" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="lastname" class="form-label">Apellido</label>
                                <input id="lastname" name="lastname" class="form-control" type="text" value="{{ old('lastname') }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input id="email" name="email" class="form-control" type="text" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" name="password" class="form-control" type="password">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="password_confirmation" class="form-label">Contraseña (confirmación)</label>
                                <input id="password_confirmation" name="password_confirmation" class="form-control" type="password">
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('usuarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
