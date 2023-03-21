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

                <form action="{{ route('estudiantes-update', ['estudiante' => $estudiante->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') ?? $estudiante->nombre }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="apellido" class="form-label">Apellido</label>
                                <input id="apellido" name="apellido" class="form-control" type="text" value="{{ old('apellido') ?? $estudiante->apellido }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="documento_tipo" class="form-label">Tipo de Documento</label>
                                <select name="documento_tipo" id="documento_tipo" class="form-control select2">
                                    <option value="">Seleccione un tipo de documento</option>
                                    <option value="Cédula de Identidad" @if($estudiante->documento_tipo=='Cédula de Identidad' ) selected @endif>Cédula de Identidad</option>
                                    <option value="Pasaporte" @if($estudiante->documento_tipo=='Pasaporte' ) selected @endif>Pasaporte</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="documento_numero" class="form-label">Número de Documento</label>
                                <input id="documento_numero" name="documento_numero" class="form-control" type="text" value="{{ old('documento_numero') ?? $estudiante->documento_numero }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nacionalidad_id" class="form-label">Nacionalidad</label>
                                <select name="nacionalidad_id" id="nacionalidad_id" class="form-control select2">
                                    <option value="">Seleccione una nacionalidad</option>
                                    @foreach ($nacionalidades as $nacionalidad)
                                    <option value="{{ $nacionalidad->id }}" @if($estudiante->nacionalidad_id==$nacionalidad->id) selected @endif>{{ $nacionalidad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" type="date" value="{{ old('fecha_nacimiento') ?? $estudiante->fecha_nacimiento }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="sexo" class="form-label">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control select2">
                                    <option value="" disabled selected>Seleccione un sexo</option>
                                    <option value="Masculino" @if($estudiante->sexo=='Masculino' ) selected @endif>Masculino</option>
                                    <option value="Femenino" @if($estudiante->sexo=='Femenino' ) selected @endif>Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="guardian_id" class="form-label">Guardián</label>
                                <select name="guardian_id" id="guardian_id" class="form-control select2">
                                    <option value="">Seleccione un guardián</option>
                                    @foreach ($guardianes as $guardian)
                                    <option value="{{ $guardian->id }}" @if($estudiante->guardian_id==$guardian->id) selected @endif>{{ $guardian->documento_numero }} - {{ $guardian->nombre }} {{ $guardian->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('estudiantes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection