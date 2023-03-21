@section('title', 'Postulantes')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('postulantes-store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="ciudad_id" class="form-label">Ciudad</label>
                                <select name="ciudad_id" id="ciudad_id" class="form-control select2" >
                                    <option value="" selected disabled>Seleccione una opcion</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}"@if($ciudad->id == old('ciudad_id')) selected @endif>{{ $ciudad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="documento_tipo" class="form-label">Tipo de Documento</label>
                                <select name="documento_tipo" id="documento_tipo" class="form-control select2">
                                    <option value="">Seleccione un tipo de documento</option>
                                    <option value="Cedula de Identidad" @if(old('documento_tipo')=='Cedula de Identidad' ) selected @endif>Cedula de Identidad</option>
                                    <option value="Pasaporte" @if(old('documento_tipo')=='Pasaporte' ) selected @endif>Pasaporte</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                <label for="documento_numero" class="form-label">Número de Documento</label>
                                <input type="text" class="form-control" id="documento_numero" name="documento_numero" value="{{ old('documento_numero') }}">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Rubros</label>
                                <ul id="columns" class="list-group">
                                    @foreach ($asignaturas as $key => $asignatura)
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input id="asignatura_id{{ $key + 1 }}" name="asignatura_id[]" class="form-check-input" type="checkbox" value="{{ $asignatura->id }}">
                                                <label class="form-check-label" for="asignatura_id{{ $key + 1 }}">{{ $asignatura->nombre }}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('postulantes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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
    </script>
@endsection
