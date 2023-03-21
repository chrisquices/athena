@section('title', 'Planes Académicos')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('planes-academicos-update', ['plan_academico' => $plan_academico->id]) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="plan_curso_id" class="form-label">Plan de Curso</label>
                            <p>
                                {{ $plan_academico->plan_curso->sede->acronimo }} |
                                {{ $plan_academico->plan_curso->grado->nombre }}
                                {{ $plan_academico->plan_curso->seccion }}
                                {{ $plan_academico->plan_curso->turno }} |
                                {{ $plan_academico->plan_curso->bachillerato->acronimo ?? 'SB' }}
                            </p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="asignatura_id" class="form-label">Asignatura</label>
                            <p>{{ $plan_academico->asignatura->nombre }}</p>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="modalidad" class="form-label">Modalidad</label>
                            <p>{{ $plan_academico->modalidad }}</p>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="alcances" class="form-label">Alcances</label>
                            <textarea id="alcances" name="alcances">{{ $plan_academico->alcances }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="contenidos" class="form-label">Contenidos</label>
                            <textarea id="contenidos" name="contenidos">{{ $plan_academico->contenidos }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="actividades" class="form-label">Actividades</label>
                            <textarea id="actividades" name="actividades">{{ $plan_academico->actividades }}</textarea>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="instrumentos" class="form-label">Instrumentos</label>
                            <textarea id="instrumentos" name="instrumentos">{{ $plan_academico->instrumentos }}</textarea>
                        </div>

                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('planes-academicos-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
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