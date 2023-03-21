@section('title', 'Horarios de Clase')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('horarios-update', ['horario' => $horario->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_curso" class="form-label">Plan de Curso</label>
                            <p>{{ $horario->plan_curso->sede->acronimo }} | {{ $horario->plan_curso->grado->nombre }} {{ $horario->plan_curso->seccion }} {{ $horario->plan_curso->turno }} | {{ $horario->plan_curso->bachillerato->acronimo ?? 'SB' }}</p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="dia" class="form-label">Día</label>
                            <p>{{ $horario->dia }}</p>
                        </div>

                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-contrato_idh1="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-hora1-tab" data-bs-toggle="pill" href="#v-pills-hora1" role="tab" aria-controls="v-pills-hora1" aria-selected="true">1° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora2-tab" data-bs-toggle="pill" href="#v-pills-hora2" role="tab" aria-controls="v-pills-hora2">2° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora3-tab" data-bs-toggle="pill" href="#v-pills-hora3" role="tab" aria-controls="v-pills-hora3">3° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora4-tab" data-bs-toggle="pill" href="#v-pills-hora4" role="tab" aria-controls="v-pills-hora4">4° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora5-tab" data-bs-toggle="pill" href="#v-pills-hora5" role="tab" aria-controls="v-pills-hora5">5° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora6-tab" data-bs-toggle="pill" href="#v-pills-hora6" role="tab" aria-controls="v-pills-hora6">6° Hora</a>

                                <a class="nav-link mb-2" id="v-pills-hora7-tab" data-bs-toggle="pill" href="#v-pills-hora7" role="tab" aria-controls="v-pills-hora7">7° Hora</a>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                                @foreach ($horario->detalle as $key => $detalle)

                                <input type="text" name="horario_detalle_id[]" value="{{ $detalle->id }}" hidden>

                                <div class="tab-pane fade show @if($key == 0) active @endif" id="v-pills-hora{{ $key+1 }}" role="tabpanel" aria-labelledby="v-pills-hora{{ $key+1 }}-tab">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="asignatura_id" class="form-label">Asignatura</label>
                                            <select name="asignatura_id[]" class="form-control select2 select-asignatura" required>
                                                @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura->id }}" @if($asignatura->id == $detalle->asignatura_id) selected @endif>{{ $asignatura->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="contrato_id" class="form-label">Docente</label>
                                            <select name="contrato_id[]" class="form-control select2">
                                                <option value="" selected disabled>Seleccione un contrato / docente</option>
                                                @foreach ($docentes as $docente)
                                                    <option value="{{ $docente->id }}" @if($docente->id == $detalle->contrato_id) selected @endif>{{ $docente->postulante->nombre }} {{ $docente->postulante->apellido }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="hora_desde" class="form-label">Hora Desde</label>
                                            <input type="text" class="form-control input-mask" data-inputmask="'mask': '99:99'" value="{{ $detalle->hora_desde }}" name="hora_desde[]" required>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="hora_hasta" class="form-label">Hora Hasta</label>
                                            <input type="text" class="form-control input-mask" data-inputmask="'mask': '99:99'" value="{{ $detalle->hora_hasta }}" name="hora_hasta[]" required>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('horarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection