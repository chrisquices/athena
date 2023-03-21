@section('title', 'Mallas Curriculares')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="area_id" class="form-label">Nombre</label>
                            <p>{{ $malla_curricular->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <label for="area_id" class="form-label">Bachillerato</label>
                            <p>
                                <a href="{{ route('bachilleratos-show', ['bachillerato_id' => $malla_curricular->bachillerato_id]) }}">
                                    {{ $malla_curricular->bachillerato->nombre ?? env('DEFAULT_EMPTY_TEXT') }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Año</label>
                            <p>{{ $malla_curricular->ano ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Plan</label>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Area</label>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Asignatura</label>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Grado</label>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <label for="area_id" class="form-label">Horas Catedras</label>
                        </div>
                    </div>

                    <div class="col-lg-2"></div>



                    @foreach ($malla_curricular_detalle as $detalle)
                    <div class="col-lg-2">
                        <div>
                            <p>{{ $detalle->plan ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <p>{{ $detalle->asignatura->area->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <p>{{ $detalle->asignatura->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <p>{{ $detalle->grado->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div>
                            <p>{{ $detalle->horas_catedras ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-2"></div>

                    @endforeach
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('mallas-curriculares-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection