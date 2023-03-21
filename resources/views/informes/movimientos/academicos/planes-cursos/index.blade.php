@section('title', 'Académicos')
@section('level-1', 'Informes')
@section('level-2', 'Movimientos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informes-movimientos-academicos-print') }}">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="size" class="form-label">Tabla</label>
                            <p>{{ $tabla_nombre }}</p>
                        </div>

                        <input type="hidden" name="tabla" value="planes_cursos">

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

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="sede_id" class="form-label">Sede</label>
                            <select name="sede_id" id="sede_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una sede</option>
                                @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="malla_curricular_id" class="form-label">Malla Curricular</label>
                            <select name="malla_curricular_id" id="malla_curricular_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione una malla curricular</option>
                                @foreach ($mallas_curriculares as $malla_curricular)
                                <option value="{{ $malla_curricular->id }}">{{ $malla_curricular->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="grado_id" class="form-label">Grado</label>
                            <select name="grado_id" id="grado_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un grado</option>
                                @foreach ($grados as $grado)
                                <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="turno" class="form-label">Turno</label>
                            <select name="turno" id="turno" class="form-control select2">
                                <option value="" selected disabled>Seleccione un turno</option>
                                <option value="Mañana">Mañana</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noche">Noche</option>
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <label for="seccion" class="form-label">Sección</label>
                            <select name="seccion" id="seccion" class="form-control select2">
                                <option value="" selected disabled>Seleccione una sección</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
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
                                        <input id="columna_sede_id" name="columnas[sede_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_sede_id">Sede</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_malla_curricular_id" name="columnas[malla_curricular_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_malla_curricular_id">Malla Curricular</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_grado_id" name="columnas[grado_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_grado_id">Grado</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_turno" name="columnas[turno]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_turno">Turno</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_seccion" name="columnas[seccion]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_seccion">Seccion</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_promedio_requerido" name="columnas[promedio_requerido]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_promedio_requerido">Promedio Requerido</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_fecha_inicio" name="columnas[fecha_inicio]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_fecha_inicio">Fecha de Inicio</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_fecha_fin" name="columnas[fecha_fin]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_fecha_fin">Fecha de Finalizacion</label>
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