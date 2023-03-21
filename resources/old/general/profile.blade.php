@section('title', 'Mi Perfil')

@extends('views.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="form-photo" hidden>
                    <input type="hidden" name="id" value="{{ $user->user->id }}">
                    <input id="photo" name="photo" type="file" onChange="$(this).submit();">
                </form>

                <form id="form" autocomplete="off">
                    <input type="hidden" name="id" value="{{ $user->user->id }}">
                    <div class="row justify-content-end">
                        <div class="col-12 text-center p-4">
                            <a href="#" onclick="$('#photo').trigger('click');">
                                <img id="profile-photo" src="" class="img-fluid rounded-circle avatar-shadow" width="200px">
                            </a>
                        </div>

                        <hr>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Nombre</label>
                            <input id="name" name="name" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Apellido</label>
                            <input id="lastname" name="lastname" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Correo Electrónico</label>
                            <input id="email" name="email" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">C.I</label>
                            <input id="ci" name="ci" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Verificado</label>
                            <input id="verified" name="verified" type="search" class="form-control" readonly>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Intentos Fallidos</label>
                            <input id="failed_attempt" name="failed_attempt" type="search" class="form-control" readonly>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Último Inicio de Sesión</label>
                            <input id="last_login" name="last_login" type="search" class="form-control" readonly>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Usuario desde</label>
                            <input id="created_at" name="created_at" type="url" class="form-control" readonly>
                        </div>
                    </div>

                    <hr>

                    <div class="col-12 text-center">
                        <button id="save" type="button" class="btn btn-primary text-center"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/general/profile.js') }}"></script>
@endsection
