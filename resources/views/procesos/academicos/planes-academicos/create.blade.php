@section('title', 'Planes Académicos')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('planes-academicos-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                            <select name="plan_curso_id" id="plan_curso_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un plan de curso</option>
                                @foreach ($planes_cursos as $plan_curso)
                                <option value="{{ $plan_curso->id }}" @if(old('plan_curso_id')==$plan_curso->id) selected @endif>{{ $plan_curso->sede->acronimo }} | {{ $plan_curso->grado->nombre }} {{ $plan_curso->seccion }} {{ $plan_curso->turno }} | {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="asignatura_id" class="form-label">Asignatura</label>
                            <select name="asignatura_id" id="asignatura_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una asignatura</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="modalidad" class="form-label">Modalidad</label>
                            <select name="modalidad" id="modalidad" class="form-control select2">
                                <option value="" selected disabled>Seleccione una modalidad</option>
                                <option value="Presencial" @if(old('modalidad')=='Presencial' ) selected @endif>Presencial</option>
                                <option value="Virtual" @if(old('modalidad')=='Virtual' ) selected @endif>Virtual</option>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="alcances" class="form-label">Alcances</label>
                            <textarea id="alcances" name="alcances">{{ old('alcances') }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="contenidos" class="form-label">Contenidos</label>
                            <textarea id="contenidos" name="contenidos">{{ old('contenidos') }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="actividades" class="form-label">Actividades</label>
                            <textarea id="actividades" name="actividades">{{ old('actividades') }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="instrumentos" class="form-label">Instrumentos</label>
                            <textarea id="instrumentos" name="instrumentos">{{ old('instrumentos') }}</textarea>
                        </div>

                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('planes-academicos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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
    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    $(document).on("change", "#plan_curso_id", function() {
        let planCursoId = $(this).val();

        getAsignaturas(planCursoId);
    });

    function getAsignaturas(planCursoId) {
        $.ajax({
                type: "GET",
                url: `/procesos/academicos/planes-academicos/get/asignaturas`,
                data: {
                    id: planCursoId,
                },
            })
            .done(function(response) {
                console.log(response);

                elementAsignatura = $('#asignatura_id');

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" selected disabled>Seleccione una asignatura</option>
                `);

                response.forEach(element => {
                    elementAsignatura.append(`
                        <option value="${element.id}" @if(old('asignatura_id') == '${element.id}') selected @endif>${element.nombre}</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>

@if(old('asignatura_id'))
<script>
    getOldAsignaturas();

    function getOldAsignaturas() {
        let asignaturaId = `{{ old('asignatura_id') }}`;

        $.ajax({
                type: "GET",
                url: `/procesos/academicos/planes-academicos/get/asignaturas`,
                data: {
                    old_id: asignaturaId,
                },
            })
            .done(function(response) {
                console.log(response);

                elementAsignatura = $('#asignatura_id');

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" disabled>Seleccione una asignatura</option>
                `);

                response.forEach(element => {
                    if (asignaturaId == element.id) {
                        elementAsignatura.append(`
                            <option value="${element.id}" selected >${element.nombre}</option>
                        `);
                    }

                    if (asignaturaId != element.id) {
                        elementAsignatura.append(`
                            <option value="${element.id}" @if(old('asignatura_id') == '${element.id}') selected @endif>${element.nombre}</option>
                        `);
                    }
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endif
@endsection