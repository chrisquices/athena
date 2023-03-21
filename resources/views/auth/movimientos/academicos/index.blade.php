@section('title', 'Académicos')
@section('level-1', 'Informes Varios')
@section('level-2', 'Movimientos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-mallas-curriculares-tab" data-bs-toggle="pill" href="#v-pills-mallas-curriculares" role="tab" aria-controls="v-pills-mallas-curriculares" aria-selected="true">Mallas Curriculares</a>

                            <a class="nav-link mb-2" id="v-pills-planes-cursos-tab" data-bs-toggle="pill" href="#v-pills-planes-cursos" role="tab" aria-controls="v-pills-planes-cursos">Planes
                                de Cursos</a>

                            <a class="nav-link mb-2" id="v-pills-planes-academicos-tab" data-bs-toggle="pill" href="#v-pills-planes-academicos" role="tab" aria-controls="v-pills-planes-academicos">Planes
                                Académicos</a>

                            <a class="nav-link mb-2" id="v-pills-horarios-clase-tab" data-bs-toggle="pill" href="#v-pills-horarios-clase" role="tab" aria-controls="v-pills-horarios-clase">Horarios
                                de Clase</a>

                            <a class="nav-link mb-2" id="v-pills-requisitos-inscripcion-tab" data-bs-toggle="pill" href="#v-pills-requisitos-inscripcion" role="tab" aria-controls="v-pills-requisitos-inscripcion">Requisitos
                                de Inscripción</a>

                            <a class="nav-link mb-2" id="v-pills-evaluaciones-tab" data-bs-toggle="pill" href="#v-pills-evaluaciones" role="tab" aria-controls="v-pills-evaluaciones">Evaluaciones</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <label for="size" class="form-label">Tamaño de Hoja</label>
                                    <select id="size" name="size" class="form-control select2">
                                        {{-- <option value="" selected disabled>Seleccione un tamaño de hoja</option>--}}
                                        <option value="a4">A4</option>
                                        <option value="legal">Legal</option>
                                        <option value="letter">Carta</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="orientation" class="form-label">Orientación</label>
                                    <select id="orientation" name="orientation" class="form-control select2">
                                        {{-- <option value="" selected disabled>Seleccione una orientación</option>--}}
                                        <option value="portrait">Vertical</option>
                                        <option value="landscape">Horizontal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="v-pills-mallas-curriculares" role="tabpanel" aria-labelledby="v-pills-mallas-curriculares-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}" class="form">
                                    <div class="row">

                                        <input type="hidden" name="tabla" value="mallas_curriculares">

                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Malla Curricular</label>
                                            <select name="malla_curricular_id" class="form-control select2" required>
                                                <option value="" selected disabled>Seleccione una malla curricular</option>
                                                @foreach ($mallas_curriculares as $malla_curricular)
                                                <option value="{{ $malla_curricular->id }}">
                                                    {{ $malla_curricular->ano }} |
                                                    {{ $malla_curricular->nombre }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        {{-- <div id="container_columns" class="col-lg-12 mb-4">--}}
                                        {{-- <label class="form-label">Columnas a mostrar</label>--}}
                                        {{-- <ul id="columns" class="list-group">--}}
                                        {{-- --}}
                                        {{-- </ul>--}}
                                        {{-- </div>--}}

                                        {{-- <div class="col-lg-6 mb-4">--}}
                                        {{-- <label for="plan_curso_mc" class="form-label">Plan de Curso</label>--}}
                                        {{-- <select id="plan_curso_mc" name="plan_curso_mc" class="form-control select2">--}}
                                        {{-- <option value="" selected disabled>Seleccione un plan de curso</option>--}}
                                        {{-- @foreach ($planes_cursos as $plan_curso)--}}
                                        {{-- <option value="{{ $plan_curso->id }}">--}}
                                        {{-- {{ $plan_curso->sede->acronimo }} |--}}
                                        {{-- {{ $plan_curso->grado->nombre }}--}}
                                        {{-- {{ $plan_curso->seccion }}--}}
                                        {{-- {{ $plan_curso->turno }} |--}}
                                        {{-- {{ $plan_curso->bachillerato->nombre ?? 'SB' }}--}}
                                        {{-- </option>--}}
                                        {{-- @endforeach--}}
                                        {{-- </select>--}}
                                        {{-- </div>--}}
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-planes-cursos" role="tabpanel" aria-labelledby="v-pills-planes-cursos-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="pc_created_at_from" class="form-label">Fecha Desde</label>
                                            <input id="pc_created_at_from" name="from" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="pc_created_at_to" class="form-label">Fecha Hasta</label>
                                            <input id="pc_created_at_to" name="to" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="pc_sede_id" class="form-label">Sede</label>
                                            <input id="pc_sede_id" name="sede_id" type="date" class="form-control">
                                        </div>

                                        <div id="container_columns" class="col-lg-12 mb-4">
                                            <label class="form-label">Columnas a mostrar</label>
                                            <ul id="columns" class="list-group">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_id" name="columnas[id|ID]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_id">ID</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_sede_id" name="columnas[sede_id|Sede]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_sede_id">Sede</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_malla_curricular_id" name="columnas[malla_curricular_id|Malla Curricular]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_malla_curricular_id">Malla Curricular</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_grado_id" name="columnas[grado_id|Grado]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_grado_id">Grado</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_turno" name="columnas[turno|Turno]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_turno">Turno</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_seccion" name="columnas[seccion|Seccion]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_seccion">Seccion</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_promedio_requerido" name="columnas[promedio_requerido|Promedio Requerido]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_promedio_requerido">Promedio Requerido</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_fecha_inicio" name="columnas[fecha_inicio|Fecha de Inicio]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_fecha_inicio">Fecha de Inicio</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_fecha_fin" name="columnas[fecha_fin|Fecha Fin]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_fecha_fin">Fecha Fin</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_estado" name="columnas[estado|Estado]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_estado">Estado</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_created_at" name="columnas[created_at|Creado el]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_created_at">Fecha de Creación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="columna_pc_updated_at" name="columnas[updated_at|Actualizado el]" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="columna_pc_updated_at">Fecha de Ultima Actualización</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-planes-academicos" role="tabpanel" aria-labelledby="v-pills-planes-academicos-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_from" class="form-label">Fecha Desde</label>
                                            <input id="created_at_from" name="created_at_from" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                            <input id="created_at_to" name="created_at_to" type="date" class="form-control">
                                        </div>

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

                                        <div id="container_columns" class="col-lg-12 mb-4">
                                            <label class="form-label">Columnas a mostrar</label>
                                            <ul id="columns" class="list-group">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">ID</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Nombre</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Observación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Creación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Ultima Actualización</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-horarios-clase" role="tabpanel" aria-labelledby="v-pills-horarios-clase-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_from" class="form-label">Fecha Desde</label>
                                            <input id="created_at_from" name="created_at_from" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                            <input id="created_at_to" name="created_at_to" type="date" class="form-control">
                                        </div>

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

                                        <div id="container_columns" class="col-lg-12 mb-4">
                                            <label class="form-label">Columnas a mostrar</label>
                                            <ul id="columns" class="list-group">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">ID</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Nombre</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Observación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Creación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Ultima Actualización</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-requisitos-inscripcion" role="tabpanel" aria-labelledby="v-pills-requisitos-inscripcion-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_from" class="form-label">Fecha Desde</label>
                                            <input id="created_at_from" name="created_at_from" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                            <input id="created_at_to" name="created_at_to" type="date" class="form-control">
                                        </div>

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

                                        <div id="container_columns" class="col-lg-12 mb-4">
                                            <label class="form-label">Columnas a mostrar</label>
                                            <ul id="columns" class="list-group">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">ID</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Nombre</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Observación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Creación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Ultima Actualización</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="v-pills-evaluaciones" role="tabpanel" aria-labelledby="v-pills-evaluaciones-tab">
                                <form action="{{ route('movimientos-academicos-pdf') }}">
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_from" class="form-label">Fecha Desde</label>
                                            <input id="created_at_from" name="created_at_from" type="date" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                            <input id="created_at_to" name="created_at_to" type="date" class="form-control">
                                        </div>

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

                                        <div id="container_columns" class="col-lg-12 mb-4">
                                            <label class="form-label">Columnas a mostrar</label>
                                            <ul id="columns" class="list-group">
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">ID</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Nombre</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Observación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Creación</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input id="col_id" name="col_id" class="form-check-input" type="checkbox" checked>
                                                        <label class="form-check-label" for="col_id">Fecha de Ultima Actualización</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row justify-content-between">
                                        <div class="col-12 responsive-button-group">
                                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-print me-2"></i>Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).on("submit", "form", function() {
        let size = $('#size option:selected').val();
        let orientation = $('#orientation option:selected').val();

        $('#hidden_size').remove();
        $('#hidden_orientation').remove();

        $(this).append(`<input type="hidden" name="size" value="${ size }" /> `);
        $(this).append(`<input type="hidden" name="orientation" value="${ orientation }" /> `);

        return true;
    });

    $('#form').submit(function(eventObj) {
        return true;
    });
</script>
@endsection