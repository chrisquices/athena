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

                    <form action="{{ route('reemplazantes-update', ['reemplazante' => $reemplazante->id]) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $reemplazante->nombre }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $reemplazante->apellido }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $reemplazante->telefono }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $reemplazante->direccion }}">
                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('reemplazantes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
