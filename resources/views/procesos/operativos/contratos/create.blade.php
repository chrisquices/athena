@section('title', 'Contratos')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contratos-store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="postulante_id" class="form-label">Postulante</label>
                                <select name="postulante_id" id="postulante_id" class="form-control select2">
                                    <option value="" selected disabled>Seleccione un postulante</option>
                                    @foreach($postulantes as $postulante)
                                        <option value="{{ $postulante->id }}" @if($postulante->id == old('postulante_id')) selected @endif>{{ $postulante->documento_numero }} - {{ $postulante->nombre }} {{ $postulante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="asignatura_id" class="form-label">Asignatura</label>
                                <select name="asignatura_id" id="asignatura_id" class="form-control select2">
                                    <option value="" selected disabled>Seleccione una asignatura</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="salario" class="form-label">Salario</label>
                                <input type="text" class="form-control" id="salario" name="salario" value="{{ old('salario') }}">
                            </div>

                            <div class="col-lg-10 col-md-12 col-sm-12 mb-3">
                                <label for="clausula_id" class="form-label">Clausulas</label>
                                <select name="clausula_id" id="clausula_id" class="form-control select2">
                                    <option value="" selected disabled>Seleccione una clausula</option>
                                    @foreach($clausulas as $clausula)
                                        <option value="{{ $clausula->id }}">{{ $clausula->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-12 col-sm-12 mb-3">
                                <label for="clausula_id" class="form-label">&nbsp;</label>
                                <button type="button" id="copy" class="btn btn-primary form-control">
                                    <i class="fa fa-copy me-2"></i>
                                    Copiar Clausula
                                </button>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                                <textarea class="form-control" name="clausulas">{{ old('clausulas') }}</textarea>
                            </div>
                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('contratos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        $(document).on("click", "#copy", function () {
            copyClausula();
        });

        $(document).on("change", "#clausula_id", function () {
            copyClausula();
        });

        $(document).on("change", "#postulante_id", function() {
            let postulanteId = $('#postulante_id option:selected').val();

            getAsignaturas(postulanteId);
        });

        function copyClausula() {
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val($('#clausula_id option:selected').text()).select();
            document.execCommand("copy");
            $temp.remove();
        }

        function getAsignaturas(postulanteId) {
            $.ajax({
                type: "GET",
                url: `/procesos/operativos/contratos/get/asignaturas`,
                data: {
                    id: postulanteId,
                },
            })
                .done(function(response) {
                    console.log(response);
                    elementAsignatura = $('#asignatura_id');

                    elementAsignatura.empty();

                    elementAsignatura.append(`
                        <option value="" selected disabled>Seleccione una asignatura</option>
                    `);

                    response.forEach(element => {
                        elementAsignatura.append(`
                            <option value="${element.id}" selected>${element.nombre}</option>
                        `);
                    });

                })
                .fail(function(response) {
                    toastr.error(DEFAULT_ERROR_RESPONSE);
                });
        }
    </script>
@endsection
