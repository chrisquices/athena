@section('title', 'Planes de Cursos')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('planes-cursos-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="sede_id" class="form-label">Sede</label>
                            <select name="sede_id" id="sede_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una sede</option>
                                @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}" @if(old('sede_id')==$sede->id ) selected @endif>{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="malla_curricular_id" class="form-label">Malla Curricular</label>
                            <select name="malla_curricular_id" id="malla_curricular_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una malla curricular</option>
                                @foreach ($mallas_curriculares as $malla_curricular)
                                <option value="{{ $malla_curricular->id }}" @if(old('malla_curricular_id')==$malla_curricular->id ) selected @endif>{{ $malla_curricular->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="grado_id" class="form-label">Grado</label>
                            <select name="grado_id" id="grado_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un grado</option>
                                @foreach ($grados as $grado)
                                <option value="{{ $grado->id }}" @if(old('grado_id')==$grado->id ) selected @endif>{{ $grado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="turno" class="form-label">Turno</label>
                            <select name="turno" id="turno" class="form-control select2">
                                <option value="" selected disabled>Seleccione un turno</option>
                                <option value="Mañana" @if(old('turno')=='Mañana' ) selected @endif>Mañana</option>
                                <option value="Tarde" @if(old('turno')=='Tarde' ) selected @endif>Tarde</option>
                                <option value="Noche" @if(old('turno')=='Noche' ) selected @endif>Noche</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="seccion" class="form-label">Sección</label>
                            <select name="seccion" id="seccion" class="form-control select2">
                                <option value="" selected disabled>Seleccione una sección</option>
                                <option value="A" @if(old('seccion')=='A' ) selected @endif>A</option>
                                <option value="B" @if(old('seccion')=='B' ) selected @endif>B</option>
                                <option value="C" @if(old('seccion')=='C' ) selected @endif>C</option>
                                <option value="D" @if(old('seccion')=='D' ) selected @endif>D</option>
                                <option value="E" @if(old('seccion')=='E' ) selected @endif>E</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="promedio_requerido" class="form-label">Promedio Requerido</label>
                            <input type="number" id="promedio_requerido" name="promedio_requerido" class="form-control" min="0" max="100" value="{{ old('promedio_requerido') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('planes-cursos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end btn-confirmation"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection