@section('title', 'Planes Diarios')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('planes-diarios-substore', ['plan_diario' => $plan_diario->id]) }}" method="POST" autocomplete="off">
                        @csrf

                        <input type="hidden" name="contrato_id" value="{{ $plan_diario->contrato_id }}">

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="contenido_desarrollado" class="form-label">Contenido Desarrollado</label>
                                <textarea type="text" class="form-control" rows="5" id="contenido_desarrollado" name="contenido_desarrollado"></textarea>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="observacion" class="form-label">Observacion</label>
                                <textarea type="text" class="form-control" rows="5" id="observacion" name="observacion"></textarea>
                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('planes-diarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection