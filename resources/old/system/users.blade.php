@section('title', 'Usuarios')

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
                                    <label class="form-label">Nombre</label>
                                    <input id="name" name="name" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Apellido</label>
                                    <input id="lastname" name="lastname" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Número C.I.</label>
                                    <input id="ci" name="ci" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Correo</label>
                                    <input id="email" name="email" type="search" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Contraseña</label>
                                    <input id="password" name="password" type="password" class="form-control" required>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label class="form-label">Verificado</label>
                                    <input id="verified" name="verified" type="search" class="form-control" readonly>
                                </div>
                                <div class="mb-4 input-hidden">
                                    <label class="form-label">Intentos Fallidos</label>
                                    <input id="failed_attempts" name="failed_attempts" type="search" class="form-control" readonly>
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
                    <button id="reset-verified" type="button" class="btn btn-warning"><i class="fa fa-refresh me-2"></i>Resetear Verificación</button>
                    <button id="reset-attempts" type="button" class="btn btn-warning"><i class="fa fa-refresh me-2"></i>Resetear Intentos</button>
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
    <script src="{{ asset('assets/js/pages/system/users.js') }}"></script>
@endsection
