@section('title', 'Requisitos de Inscripción')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('requisitos-inscripciones-update', ['plan_curso' => $plan_curso->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="plan_curso_id" value="{{ $plan_curso->id }}">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_curso->sede->acronimo }} |
                                {{ $plan_curso->grado->nombre }}
                                {{ $plan_curso->seccion }}
                                {{ $plan_curso->turno }} |
                                {{ $plan_curso->bachillerato->nombre ?? 'SB' }}
                            </p>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Requisitos</label>
                            <ul id="columns" class="list-group">
                                @foreach ($requisitos as $requisito)
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input id="requisito_id{{ $requisito->id }}" name="requisito_id[]" class="form-check-input" type="checkbox" value="{{ $requisito->id }}" @if($requisito->checked) checked @endif>
                                        <label class="form-check-label" for="requisito_id{{ $requisito->id }}">{{ $requisito->nombre }}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('requisitos-inscripciones-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection