@section('title', 'Operativos')
@section('level-1', 'Informes')
@section('level-2', 'Movimientos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informes-movimientos-documentales-print') }}">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="size" class="form-label">Tabla</label>
                            <p>{{ $tabla_nombre }}</p>
                        </div>

                        <input type="hidden" name="tabla" value="libretas">

                        <div class="col-lg-6 mb-4">
                            <label for="size" class="form-label">Tamaño de Hoja</label>
                            <select id="size" name="size" class="form-control select2">
                                <option value="a4">A4</option>
                                <option value="legal">Legal</option>
                                <option value="letter">Carta</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="orientation" class="form-label">Orientación</label>
                            <select id="orientation" name="orientation" class="form-control select2">
                                <option value="portrait">Vertical</option>
                                <option value="landscape">Horizontal</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                            <select id="plan_curso_id" name="plan_curso_id" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione un plan de curso</option>
                                @foreach ($planes_cursos as $plan_curso)
                                    <option value="{{ $plan_curso->id }}">
                                        {{ $plan_curso->sede->acronimo }} |
                                        {{ $plan_curso->grado->nombre }}
                                        {{ $plan_curso->seccion }}
                                        {{ $plan_curso->turno }} |
                                        {{ $plan_curso->bachillerato->nombre ?? 'SB' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="inscripcion_id" class="form-label">Inscripcion / Estudiante</label>
                            <select id="inscripcion_id" name="inscripcion_id" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione una inscripcion / estudiante</option>
                            </select>
                        </div>

                        <p>Escala de Notas</p>

                        <hr>

                        <div class="col-lg-1 mb-4">
                            <p>Nota 1 </p>
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota1_desde" class="form-control mb-2" value="0">
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota1_hasta" class="form-control mb-2" value="80">
                        </div>

                        <div class="col-lg-9"></div>

                        <div class="col-lg-1 mb-4">
                            <p>Nota 2 </p>
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota2_desde" class="form-control mb-2" value="81">
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota2_hasta" class="form-control mb-2" value="85">
                        </div>

                        <div class="col-lg-9"></div>

                        <div class="col-lg-1 mb-4">
                            <p>Nota 3 </p>
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota3_desde" class="form-control mb-2" value="86">
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota3_hasta" class="form-control mb-2" value="90">
                        </div>

                        <div class="col-lg-9"></div>

                        <div class="col-lg-1 mb-4">
                            <p>Nota 4 </p>
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota4_desde" class="form-control mb-2" value="91">
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota4_hasta" class="form-control mb-2" value="95">
                        </div>

                        <div class="col-lg-9"></div>

                        <div class="col-lg-1 mb-4">
                            <p>Nota 5 </p>
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota5_desde" class="form-control mb-2" value="96">
                        </div>

                        <div class="col-lg-1 mb-4">
                            <input type="number" min="0" max="100" name="nota5_hasta" class="form-control mb-2" value="100">
                        </div>

                        <div class="col-lg-9"></div>

                    </div>

                    <hr>

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('informes-index') }}" class="btn btn-outline-primary float-start"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
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
        loadInscripciones();
    });

    function loadInscripciones() {
        $.ajax({
            type: "GET",
            url: `/informes/movimientos/get/inscripciones`,
            data: {
                id: $('#plan_curso_id option:selected').val(),
            },
        })
            .done(function(response) {
                container = $('#inscripcion_id');

                container.empty();

                console.log(response);
                container.append(`
                    <option value="" selected disabled>Seleccione una inscripcion / estudiante</option>
                `);

                response.forEach(element => {
                    container.append(`
                        <option value="${ element.id }">${ element.estudiante.nombre } ${ element.estudiante.apellido }</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection
