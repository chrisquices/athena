@section('title', 'Académicos')
@section('level-1', 'Informes')
@section('level-2', 'Referenciales')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('informes-referenciales-print') }}">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="size" class="form-label">Tabla</label>
                            <p>{{ $tabla_nombre }}</p>
                        </div>

                        <input type="hidden" name="tabla" value="estudiantes">

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
                            <label for="guardian_id" class="form-label">Guardian</label>
                            <select id="guardian_id" name="guardian_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un guardian</option>
                                @foreach ($guardianes as $guardian)
                                <option value="{{ $guardian->id }}">{{ $guardian->documento_numero }} - {{ $guardian->nombre }} {{ $guardian->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="nacionalidad_id" class="form-label">Nacionalidad</label>
                            <select id="nacionalidad_id" name="nacionalidad_id" class="form-control select2">
                                <option value="" selected disabled>Seleccione un guardian</option>
                                @foreach ($nacionalidades as $nacionalidad)
                                <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="documento_tipo" class="form-label">Tipo de Documento</label>
                            <select name="documento_tipo" id="documento_tipo" class="form-control select2">
                                <option value="" selected disabled>Seleccione un tipo de documento</option>
                                <option value="Cédula de Identidad">Cédula de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control select2">
                                <option value="" selected disabled>Seleccione un sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
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
                                        <input id="columna_guardian_id" name="columnas[guardian_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_guardian_id">Guardian</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_nacionalidad_id" name="columnas[nacionalidad_id]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_nacionalidad_id">Nacionalidad</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_nombre" name="columnas[nombre]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_nombre">Nombre</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_apellido" name="columnas[apellido]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_apellido">Apellido</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_documento_tipo" name="columnas[documento_tipo]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_documento_tipo">Tipo de Documento</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_documento_numero" name="columnas[documento_numero]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_documento_numero">Numero de Documento</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_fecha_nacimiento" name="columnas[fecha_nacimiento]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_fecha_nacimiento">Fecha de Nacimiento</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="columna_sexo" name="columnas[sexo]" class="form-check-input" type="checkbox" checked>
                                        <label class="form-check-label" for="columna_sexo">Sexo</label>
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