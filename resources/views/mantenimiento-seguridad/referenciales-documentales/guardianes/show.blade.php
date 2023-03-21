@section('title', 'Guardianes')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Documentales')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Nombre</label>
                            <p>{{ $guardian->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Apellido</label>
                            <p>{{ $guardian->apellido ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Tipo de Documento</label>
                            <p>{{ $guardian->documento_tipo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Número de Documento</label>
                            <p>{{ $guardian->documento_numero ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Ciudad</label>
                            <p>{{ $guardian->ciudad->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label class="form-label">Direccion</label>
                            <p>{{ $guardian->direccion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div>
                            <label class="form-label">Telefono</label>
                            <p>{{ $guardian->telefono ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label class="form-label">Encargado de</label>
                            <ul>
                                @foreach($guardian->estudiante as $estudiante)
                                <li>
                                    <a href="{{ route('estudiantes-show', ['estudiante' => $estudiante->id]) }}">{{ $estudiante->nombre }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('guardianes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('input').attr('disabled', true);
    });
</script>
@endsection