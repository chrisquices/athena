@section('title', 'Datos de la Institución')

@extends('views.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="form-emblem" hidden>
                    <input id="emblem" name="emblem" type="file" onChange="$(this).submit();">
                </form>

                <form id="form" autocomplete="off">
                    <div class="row justify-content-end">
                        <div class="col-12 text-center p-4">
                            <a href="#" onclick="$('#emblem').trigger('click');">
                                <img id="institution-emblem" src="" class="img-fluid" width="200px">
                            </a>
                        </div>

                        <hr>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Nombre</label>
                            <input id="name" name="name" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Administración</label>
                            <input id="name_administration" name="name_administration" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Fundador</label>
                            <input id="founder" name="founder" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Fundado el</label>
                            <input id="foundation_date" name="foundation_date" type="date" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Teléfono Primario</label>
                            <input id="telephone_primary" name="telephone_primary" type="search" class="form-control input-mask" data-inputmask="'mask': '(9999)-999-999'" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Teléfono Secundario</label>
                            <input id="telephone_secondary" name="telephone_secondary" type="search" class="form-control input-mask" data-inputmask="'mask': '(9999)-999-999'" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Eslogan</label>
                            <input id="slogan" name="slogan" type="search" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Facebook</label>
                            <input id="facebook" name="facebook" type="url" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Twitter</label>
                            <input id="twitter" name="twitter" type="url" class="form-control" required>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label class="form-label">Instagram</label>
                            <input id="instagram" name="instagram" type="url" class="form-control" required>
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label">Sobre nosotros</label>
                            <textarea id="about_us" name="about_us" type="text" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="col-lg-6 mb-4" hidden>
                            <label class="form-label">Emblema</label>
                            <input id="emblem" name="emblem" type="file" class="form-control custom-file-input">
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
    <script src="{{ asset('assets/js/pages/system/institutions.js') }}"></script>
@endsection
