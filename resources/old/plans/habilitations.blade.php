@section('title', 'Habilitaciones de Asignaturas')

@extends('views.layouts.app')

@section('content')
<div class="col-12">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Gestión de @yield('title')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="form" style="margin-bottom: -40px !important;" autocomplete="off" class="needs-validation" novalidate>
                                <input id="id" name="id" type="hidden">
                                <div class="mb-4">
                                    <label class="form-label">Curso</label>
                                    <select id="course_id" name="course_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un curso</option>
                                    </select>
                                </div>
                                <div id="container_subject_id" class="mb-4">
                                    <label class="form-label">Asignatura</label>
                                    <select id="subject_id" name="subject_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione una asignatura</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Modalidad</label>
                                    <select id="modality" name="modality" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione una modalidad</option>
                                        <option value="Presencial">Presencial</option>
                                        <option value="Virtual">Virtual</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Requerido</label>
                                    <select id="required" name="required" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione una opción</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Horas semanales</label>
                                        <input id="hour_weekly" name="hour_weekly" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Promedio requerido</label>
                                    <input id="average_required" name="average_required" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label class="form-label">Estado</label>
                                    <input id="status" name="status" type="text" class="form-control" readonly>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label class="form-label">Creado el</label>
                                    <input id="created_at" name="created_at" type="text" class="form-control" readonly>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label class="form-label">Actualizado el</label>
                                    <input id="updated_at" name="updated_at" type="text" class="form-control" readonly>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button id="anull" type="button" class="btn btn-warning"><i class="fa fa-ban me-2"></i>Anular</button>
                    <button id="save" type="button" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <select name="course_id" class="form-control select2 course_id">
                            <option disabled selected value="">Seleccione un curso</option>
                        </select>
                    </div>
                </div>

                <hr>

                <table id="table" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/plans/habilitations.js') }}"></script>
@endsection
