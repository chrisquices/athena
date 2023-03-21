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

                <form action="{{ route('guardianes-update', ['guardian' => $guardian->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')


                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') ?? $guardian->nombre }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="apellido" class="form-label">Apellido</label>
                                <input id="apellido" name="apellido" class="form-control" type="text" value="{{ old('apellido') ?? $guardian->apellido }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="documento_tipo" class="form-label">Tipo de Documento</label>
                                <select name="documento_tipo" id="documento_tipo" class="form-control select2">
                                    <option value="">Seleccione un tipo de documento</option>
                                    <option value="Cédula de Identidad" @if($guardian->documento_tipo=='Cédula de Identidad' ) selected @endif>Cédula de Identidad</option>
                                    <option value="Pasaporte" @if($guardian->documento_tipo=='Pasaporte' ) selected @endif>Pasaporte</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="documento_numero" class="form-label">Número de Documento</label>
                                <input id="documento_numero" name="documento_numero" class="form-control" type="text" value="{{ old('documento_numero') ?? $guardian->documento_numero }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="ciudad_id" class="form-label">Ciudad</label>
                                <select name="ciudad_id" id="ciudad_id" class="form-control select2">
                                    <option value="">Seleccione una ciudad</option>
                                    @foreach ($ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}" @if($guardian->ciudad_id==$ciudad->id) selected @endif>{{ $ciudad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="direccion" class="form-label">Direccion</label>
                                <input id="direccion" name="direccion" class="form-control" type="text" value="{{ old('direccion') ?? $guardian->direccion }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="telefono" class="form-label">Telefono</label>
                                <input id="telefono" name="telefono" class="form-control" type="text" value="{{ old('telefono') ?? $guardian->telefono }}">
                            </div>
                        </div>

                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('guardianes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection