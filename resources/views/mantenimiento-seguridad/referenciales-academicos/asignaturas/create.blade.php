@section('title', 'Asignaturas')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('asignaturas-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="area_id" class="form-label">Área</label>
                                <select name="area_id" id="area_id" class="form-control select2">
                                    <option value="">Seleccione un área</option>

                                    @foreach($areas as $area)
                                    <option value="{{ $area->id }}" @if($area->id == old('area_id')) selected @endif>{{ $area->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="acronimo" class="form-label">Acrónimo</label>
                                <input id="acronimo" name="acronimo" class="form-control" type="text" value="{{ old('acronimo') }}">
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('asignaturas-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection