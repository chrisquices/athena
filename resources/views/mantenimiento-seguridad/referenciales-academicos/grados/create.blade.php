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
                <form action="{{ route('grados-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input name="nombre" class="form-control" type="text" value="{{ old('nombre') }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre_alternativo" class="form-label">Nombre Alternativo</label>
                                <input name="nombre_alternativo" class="form-control" type="text" value="{{ old('nombre_alternativo') }}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nivel" class="form-label">Nivel</label>
                                <select name="nivel" class="form-control select2">
                                    <option value="" disabled selected>Seleccione una opcion</option>
                                    <option value="Educación Escolar Básica" @if(old('nivel')=='Educación Escolar Básica' ) selected @endif>Educación Escolar Básica</option>
                                    <option value="Educación Media" @if(old('nivel')=='Educación Media' ) selected @endif>Educación Media</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nivel_acronimo" class="form-label">Nivel (acrónimo)</label>
                                <input name="nivel_acronimo" class="form-control" type="text" value="{{ old('nivel_acronimo') }}">
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('grados-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection