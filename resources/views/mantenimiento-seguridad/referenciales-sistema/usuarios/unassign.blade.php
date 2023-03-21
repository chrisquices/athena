@section('title', 'Usuarios')
@section('level-1', 'Mantenimiento y Seguridad')
@section('level-2', 'Ref. Sistema')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('usuarios-unassign-store', ['user' => $user->id]) }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="contrato_id" class="form-label">Contrato</label>
                                <select name="contrato_id" id="contrato_id" class="form-control select2">
                                    <option value="">Seleccione un contrato / docente</option>
                                    @foreach ($contratos as $contrato)
                                        <option value="{{ $contrato->id }}">Contrato N° {{ $contrato->id }} - C.I. {{ $contrato->postulante->documento_numero }} - {{ $contrato->postulante->nombre }} {{ $contrato->postulante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('usuarios-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2 btn-confirmation"></i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
