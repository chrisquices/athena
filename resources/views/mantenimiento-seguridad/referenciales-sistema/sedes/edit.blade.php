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

                <form action="{{ route('sedes-update', ['sede' => $sede->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') ?? $sede->nombre }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="acronimo" class="form-label">Acrónimo</label>
                                <input id="acronimo" name="acronimo" class="form-control" type="text" value="{{ old('acronimo') ?? $sede->acronimo }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input id="telefono" name="telefono" class="form-control" type="text" value="{{ old('telefono') ?? $sede->telefono }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="direccion" class="form-label">Dirección</label>
                                <input id="direccion" name="direccion" class="form-control" type="text" value="{{ old('direccion') ?? $sede->direccion }}">
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('sedes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection