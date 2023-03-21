@section('title', 'Documentales')
@section('level-1', 'Informes Varios')
@section('level-2', 'Referenciales')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-nacionalidades-tab"
                                   data-bs-toggle="pill"
                                   href="#v-pills-nacionalidades" role="tab"
                                   aria-controls="v-pills-nacionalidades"
                                   aria-selected="true">Nacionalidades</a>

                                <a class="nav-link mb-2" id="v-pills-estudiantes-tab" data-bs-toggle="pill"
                                   href="#v-pills-estudiantes" role="tab" aria-controls="v-pills-estudiantes">Estudiantes</a>

                                <a class="nav-link mb-2" id="v-pills-guardianes-tab" data-bs-toggle="pill"
                                   href="#v-pills-guardianes" role="tab" aria-controls="v-pills-guardianes">Guardianes</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-nacionalidades" role="tabpanel"
                                     aria-labelledby="v-pills-nacionalidades-tab">
                                    <form action="{{ route('referenciales-documentales-pdf') }}">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_from" class=" form-label">Fecha Desde</label>
                                                <input id="created_at_from" name="created_at_from" type="date"
                                                       class="form-control">
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                                <input id="created_at_to" name="created_at_to" type="date"
                                                       class="form-control">
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
                                                <select id="orientation" name="orientation"
                                                        class="form-control select2">
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

                                <div class="tab-pane fade" id="v-pills-estudiantes" role="tabpanel"
                                     aria-labelledby="v-pills-estudiantes-tab">
                                    <form action="{{ route('referenciales-documentales-pdf') }}">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_from" class="form-label">Fecha Desde</label>
                                                <input id="created_at_from" name="created_at_from" type="date"
                                                       class="form-control">
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                                <input id="created_at_to" name="created_at_to" type="date"
                                                       class="form-control">
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
                                                <select id="orientation" name="orientation"
                                                        class="form-control select2">
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

                                <div class="tab-pane fade" id="v-pills-guardianes" role="tabpanel"
                                     aria-labelledby="v-pills-guardianes-tab">
                                    <form action="{{ route('referenciales-documentales-pdf') }}">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_from" class="form-label">Fecha Desde</label>
                                                <input id="created_at_from" name="created_at_from" type="date"
                                                       class="form-control">
                                            </div>

                                            <div class="col-lg-6 mb-4">
                                                <label for="created_at_to" class="form-label">Fecha Hasta</label>
                                                <input id="created_at_to" name="created_at_to" type="date"
                                                       class="form-control">
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
                                                <select id="orientation" name="orientation"
                                                        class="form-control select2">
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
