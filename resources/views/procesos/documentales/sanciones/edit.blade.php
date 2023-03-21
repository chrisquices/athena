@section('title', 'Sanciones')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('sanciones-update', ['sancion' => $sancion->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="inscripcion_id" class="form-label">Inscripción</label>
                            <p>
                                {{ $sancion->inscripcion->estudiante->nombre }}
                                {{ $sancion->inscripcion->estudiante->apellido }}
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-control select2">
                                <option value="" selected disabled>Seleccione un tipo</option>
                                <option value="Leve" @if($sancion->tipo == 'Leve') selected @endif>Leve</option>
                                <option value="Grave" @if($sancion->tipo == 'Grave') selected @endif>Grave</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="causa_id" class="form-label">Causa</label>
                            <select name="causa_id" id="causa_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una causa</option>
                                @foreach ($causas as $causa)
                                <option value="{{ $causa->id }}" @if($sancion->causa_id == $causa->id) selected @endif >{{ $causa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="observacion" class="form-label">Observacion</label>
                            <textarea type="text" class="form-control" id="observacion" name="observacion" rows="5">{{ $sancion->observacion }}</textarea>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('sanciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection