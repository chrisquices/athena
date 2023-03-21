@section('title', 'Causas')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Operativos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('causas-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" class="form-control select2">
                                    <option value="" disabled selected>Seleccione un tipo</option>
                                    <option value="Desercion" @if(old('tipo')=='Desercion' ) selected @endif>Desercion</option>
                                    <option value="Justificativo" @if(old('tipo')=='Justificativo' ) selected @endif>Justificativo</option>
                                    <option value="Permiso" @if(old('tipo')=='Permiso' ) selected @endif>Permiso</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') }}">
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('causas-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection