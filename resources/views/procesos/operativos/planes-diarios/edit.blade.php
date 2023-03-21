@section('title', 'Planes Diarios')
@section('level-1', 'Procesos')
@section('level-2', 'Operativos')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('areas-update', ['area' => 1]) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PATCH')

                        @include('mantenimiento-seguridad.referenciales-academicos.areas.fields')

                        @include('layouts.errors')

                        <div class="row justify-content-between">
                            <div class="col-12 responsive-button-group">
                                <a href="{{ route('areas-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
