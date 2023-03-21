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
                <form action="{{ route('informes-movimientos-operativos-print') }}">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="size" class="form-label">Tabla</label>
                            <p>{{ $tabla_nombre }}</p>
                        </div>

                        <input type="hidden" name="tabla" value="contratos">

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
                            <label for="asignatura_id" class="form-label">Asignatura</label>
                            <select name="asignatura_id" id="asignatura_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una asignatura</option>
                                @foreach ($asignaturas as $asignatura)
                                    <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="postulante_id" class="form-label">Postulante</label>
                            <select name="postulante_id" id="postulante_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un postulante</option>
                                @foreach ($postulantes as $postulante)
                                    <option value="{{ $postulante->id }}">{{ $postulante->nombre }} {{ $postulante->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="salario_desde" class="form-label">Salario desde</label>
                            <input type="number" class="form-control" id="salario_desde" name="salario_desde">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="salario_hasta" class="form-label">Salario hasta</label>
                            <input type="number" class="form-control" id="salario_hasta" name="salario_hasta">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="fecha_desde" class="form-label">Fecha desde</label>
                            <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="fecha_hasta" class="form-label">Fecha hasta</label>
                            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-control select2">
                                <option value="Activo">Activo</option>
                                <option value="Anulado">Anulado</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>

                        <div id="container_columns" class="col-lg-12 mb-4">
                            <label class="form-label">Columnas a mostrar</label>
                            <ul id="columns" class="list-group">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_id" name="columnas[id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_id">ID</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_asignatura_id" name="columnas[asignatura_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_asignatura_id">Asignatura</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_postulante_id" name="columnas[postulante_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_postulante_id">Postulante</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_clausula" name="columnas[clausula]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_clausula">Clausula</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_fecha_inicio" name="columnas[fecha_inicio]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_fecha_inicio">Fecha Inicio</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_salario" name="columnas[salario]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_salario">Salario</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_estado" name="columnas[estado]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_estado">Estado</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_created_at" name="columnas[created_at]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_created_at">Fecha de Creación</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_updated_at" name="columnas[updated_at]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_updated_at">Fecha de Ultima Actualización</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
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
        loadPlanesAcademicos();
    });

    function loadPlanesAcademicos() {
        $.ajax({
                type: "GET",
                url: `/informes/movimientos/planes-academicos/get/planes-academicos`,
                data: {
                    plan_curso_id: $('#plan_curso_id option:selected').val(),
                },
            })
            .done(function(response) {
                container = $('#planes_academicos_container');

                container.empty();

                response.forEach(element => {
                    container.append(`
                        <li class="list-group-item">
                            <div class="form-check">
                                <input id="columna_id${element.id}" name="planes_academicos[${element.id}]" class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label" for="columna_id${element.asignatura_id}">${element.asignatura.nombre}</label>
                            </div>
                        </li>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection
