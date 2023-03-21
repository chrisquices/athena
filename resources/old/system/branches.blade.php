@section('title', 'Sedes')

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
                                    <label for="name" class="form-label">Nombre</label>
                                    <input id="name" name="name" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label for="acronym" class="form-label">Acrónimo</label>
                                    <input id="acronym" name="acronym" type="search" class="form-control text-uppercase" required>
                                </div>
                                <div class="mb-4">
                                    <label for="telephone" class="form-label">Teléfono</label>
                                    <input id="telephone" name="telephone" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input id="address" name="address" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label for="status" class="form-label">Estado</label>
                                    <input id="status" name="status" type="text" class="form-control" readonly>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label for="created_at" class="form-label">Creado el</label>
                                    <input id="created_at" name="created_at" type="text" class="form-control" readonly>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label for="updated_at" class="form-label">Actualizado el</label>
                                    <input id="updated_at" name="updated_at" type="text" class="form-control" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button id="deactivate" type="button" class="btn btn-warning"><i class="fa fa-ban me-2"></i>Desactivar</button>
                    <button id="reactivate" type="button" class="btn btn-success"><i class="fa fa-refresh me-2"></i>Reactivar</button>
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
    <script src="{{ asset('assets/js/pages/system/branches.js') }}"></script>
@endsection
