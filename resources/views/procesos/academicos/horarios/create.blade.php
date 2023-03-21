@section('title', 'Horarios de Clase')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('horarios-store') }}" method="POST" autocomplete="off">
                <div class="card-body">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_curso" class="form-label">Plan de Curso</label>
                            <select name="plan_curso_id" id="plan_curso_id" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione un plan de curso</option>
                                @foreach ($planes_cursos as $plan_curso)
                                <option value="{{ $plan_curso->id }}" @if(old('plan_curso_id')==$plan_curso->id) selected @endif>{{ $plan_curso->sede->acronimo }} | {{ $plan_curso->grado->nombre }} {{ $plan_curso->seccion }} {{ $plan_curso->turno }} | {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="dia" class="form-label">Día</label>
                            <select name="dia" id="dia" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione un dia</option>
                            </select>
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

                                @for ($i = 0; $i < 7; $i++) <div class="tab-pane fade show @if($i == 0) active @endif" id="v-pills-hora{{ $i+1 }}" role="tabpanel" aria-labelledby="v-pills-hora{{ $i+1 }}-tab">

                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="asignatura_id" class="form-label">Asignatura</label>
                                            <select name="asignatura_id[]" class="form-control select2 select-asignatura" required>
                                                <option value="" selected disabled>Seleccione una asignatura</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="contrato_id" class="form-label">Docente / Contrato</label>
                                            <select name="contrato_id[]" class="form-control select2" required>
                                                <option value="" selected disabled>Seleccione un contrato</option>
                                                @foreach ($contratos as $contrato)
                                                <option value="{{ $contrato->id }}">Contrato N° {{ $contrato->id }} - {{ $contrato->postulante->nombre }} {{ $contrato->postulante->apellido }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="hora_desde" class="form-label">Hora Desde</label>
                                            <input type="text" class="form-control input-mask" data-inputmask="'mask': '99:99'" value="07:00" name="hora_desde[]" required>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="hora_hasta" class="form-label">Hora Hasta</label>
                                            <input type="text" class="form-control input-mask" data-inputmask="'mask': '99:99'" value="07:40" name="hora_hasta[]" required>
                                        </div>
                                    </div>
                            </div>
                            @endfor

                        </div>
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

@section('scripts')
<script>
    $(document).on("change", "#plan_curso_id", function() {
        let planCursoId = $(this).val();

        getAsignaturas(planCursoId);
        getDias(planCursoId);
    });

    function getAsignaturas(planCursoId) {
        $.ajax({
                type: "GET",
                url: `/procesos/academicos/horarios/get/asignaturas`,
                data: {
                    id: planCursoId,
                },
            })
            .done(function(response) {
                console.log(response);
                elementAsignatura = $('.select-asignatura');

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" selected disabled>Seleccione una asignatura</option>
                `);

                // response.forEach(element => {
                //     elementAsignatura.append(`
                //         <option value="${element.id}" @if(old('asignatura_id') == '${element.id}') selected @endif>${element.nombre}</option>
                //     `);
                // });

                response.forEach(element => {
                    elementAsignatura.append(`
                        <option value="${element.id}" selected>${element.nombre}</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }

    function getDias(planCursoId) {
        $.ajax({
                type: "GET",
                url: `/procesos/academicos/horarios/get/dias`,
                data: {
                    id: planCursoId,
                },
            })
            .done(function(response) {
                console.log('hey');
                console.log(response);

                elementAsignatura = $('#dia');

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" selected disabled>Seleccione un dia</option>
                `);

                response.forEach(element => {
                    elementAsignatura.append(`
                        <option value="${element}">${element}</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection