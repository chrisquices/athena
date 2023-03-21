@section('title', 'Usuarios')
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
                            <p>{{ $user->name ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Apellido</label>
                            <p>{{ $user->lastname ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Rol</label>
                            <p>{{ $user->role ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Verificado</label>
                            <p>@if($user->verified) Si @else No @endif</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Intentos Fallidos</label>
                            <p>{{ $user->failed_attempt ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Correo Electrónico</label>
                            <p>{{ $user->telefono_alternativo ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-3">
                        <div>
                            <label class="form-label">Estado</label>
                            <p>{{ $user->status ?? env('DEFAULT_EMPTY_TEXT') }}</p>
                        </div>
                    </div>

                    <hr>
                    <br>
                    <div class="col-lg-12 mb-3">
                        <div>
                            <label class="form-label">Contratos</label>
                            @foreach ($contratos as $contrato)
                                <p>Contrato N° {{ $contrato->id }} - {{ $contrato->contrato->asignatura->nombre }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row justify-content-between">
                    <div class="col-12 responsive-button-group">
                        <a href="{{ route('usuarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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
