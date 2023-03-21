@section('title', 'Calendarios Academicos')
@section('level-1', 'Procesos')
@section('level-2', 'Academicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('calendarios-academicos-update', ['calendario_academico' => $calendario_academico->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="ano" class="form-label">Ano</label>
                                <select name="ano" id="ano" class="form-control select2">
                                    <option value="" selected disabled>Seleccione un ano</option>

                                    @foreach ($anos as $ano)
                                        <option value="{{ $ano }}" @if($calendario_academico->ano == $ano) selected @endif>{{ $ano }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" value="{{ old('nombre') ?? $calendario_academico->nombre }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div>
                                <label for="fecha" class="form-label">Fecha</label>
                                <input id="fecha" name="fecha" class="form-control" type="date" value="{{ old('fecha') ?? $calendario_academico->fecha }}">
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