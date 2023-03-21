@section('title', 'Causas')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Operativos')

@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="causa_id" class="form-label">Tipo</label>
                            <p>{{ $causa->tipo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div>
                            <label for="acronimo" class="form-label">Nombre</label>
                            <p>{{ $causa->nombre ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('causas-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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