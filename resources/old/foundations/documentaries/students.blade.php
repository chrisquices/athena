@section('title', 'Estudiantes')

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
                                    <label class="form-label">Guardián</label>
                                    <select id="guardian_id" name="guardian_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un guardián</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nombre</label>
                                    <input id="name" name="name" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Apellido</label>
                                    <input id="lastname" name="lastname" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Tipo de Documento</label>
                                    <select id="document_type" name="document_type" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione un tipo de documento</option>
                                        <option value="Cédula de Identidad">Cédula de Identidad</option>
                                        <option value="Certificado de Nacimiento">Certificado de Nacimiento</option>
                                        <option value="Documento Extranjero">Documento Extranjero</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Sin Documento">Sin Documento</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Número de Documento</label>
                                    <input id="document_number" name="document_number" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Nacionalidad</label>
                                    <select id="nationality_id" name="nationality_id" class="form-control select2 select2-reset">
                                        <option disabled selected value="">Seleccione una nacionalidad</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Fecha de nacimiento</label>
                                    <input id="birth_date" name="birth_date" type="date" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Sexo</label>
                                    <select id="sex" name="sex" class="form-control" required>
                                        <option disabled selected value="">Seleccione un sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
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
                    <button id="delete" type="button" class="btn btn-danger"><i class="fa fa-minus-circle me-2"></i>Eliminar</button>
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
    <script src="{{ asset('assets/js/pages/foundations/documentaries/students.js') }}"></script>
@endsection
