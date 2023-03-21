@section('title', 'Sedes')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Sistema')

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
                            <p>{{ $sede->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Acrónimo</label>
                            <p>{{ $sede->acronimo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Teléfono</label>
                            <p>{{ $sede->telefono ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label class="form-label">Dirección</label>
                            <p>{{ $sede->direccion ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('sedes-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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