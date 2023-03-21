@section('title', 'Planificaciones de Cursos')

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
                            <form id="form" class="form-modal" autocomplete="off">
                                <input id="id" name="id" type="hidden">
                                <div class="mb-4">
                                    <label for="grade_id" class="form-label">Grado</label>
                                    <select id="grade_id" name="grade_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un grado</option>
                                    </select>
                                </div>
                                <div id="container_baccalaureate" class="mb-4">
                                    <label class="form-label">Bachillerato</label>
                                    <select id="baccalaureate_id" name="baccalaureate_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un bachillerato</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Sección</label>
                                    <select id="section_id" name="section_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione una sección</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Turno</label>
                                    <select id="shift" name="shift" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un turno</option>
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                        <option value="Noche">Noche</option>
                                        <option value="Especial">Especial</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Fecha de inicio</label>
                                    <input id="start_date" name="start_date" type="date" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Fecha de finalización</label>
                                    <input id="end_date" name="end_date" type="date" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Precio de matrícula</label>
                                    <input id="tuition_fee" name="tuition_fee" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Precio de cuota</label>
                                    <input id="installment_fee" name="installment_fee" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Cantidad de cuotas</label>
                                    <input id="installment_quantity" name="installment_quantity" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Requisitos</label>
                                    <select id="requirement_id" name="requirement_id[]" class="select2 form-control select2-multiple" multiple="multiple"></select>
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
                    <button id="anull" type="button" class="btn btn-danger"><i class="fa fa-times-circle me-2"></i>Anular</button>
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
                <table id="table" class="table table-hover dt-responsive nowrap"></table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/plans/courses.js') }}"></script>
@endsection
