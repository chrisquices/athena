@section('title', 'Académicos')
@section('level-1', 'Informes')
@section('level-2', 'Referenciales')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Movimientos Academicos</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-movimientos-mallas-curriculares') }}" type="button" class="btn btn-primary waves-effect waves-light">Mallas Curriculares</a>
                        <a href="{{ route('informes-movimientos-planes-cursos') }}" type="button" class="btn btn-primary waves-effect waves-light">Planes de Cursos</a>
                        <a href="{{ route('informes-movimientos-planes-academicos') }}" type="button" class="btn btn-primary waves-effect waves-light">Planes Academicos</a>
                        <a href="{{ route('informes-movimientos-horarios') }}" type="button" class="btn btn-primary waves-effect waves-light">Horarios de Clase</a>
                        <a href="{{ route('informes-movimientos-requisitos-inscripcion') }}" type="button" class="btn btn-primary waves-effect waves-light">Requisitos de Inscripcion</a>
                        <a href="{{ route('informes-movimientos-planes-evaluaciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Planes de Evaluaciones</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Movimientos Operativos</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-movimientos-postulantes') }}" type="button" class="btn btn-primary waves-effect waves-light">Postulantes</a>
                        <a href="{{ route('informes-movimientos-contratos') }}" type="button" class="btn btn-primary waves-effect waves-light">Contratos</a>
                        <a href="{{ route('informes-movimientos-justificativos-operativo') }}" type="button" class="btn btn-primary waves-effect waves-light">Justificativos</a>
                        <a href="{{ route('informes-movimientos-permisos') }}" type="button" class="btn btn-primary waves-effect waves-light">Permisos</a>
                        <a href="{{ route('informes-movimientos-reemplazantes') }}" type="button" class="btn btn-primary waves-effect waves-light">Reemplazantes</a>
                        <a href="{{ route('informes-movimientos-asistencias-operativo') }}" type="butt`on" class="btn btn-primary waves-effect waves-light">Asistencias Operativo</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Movimientos Documentales</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-movimientos-inscripciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Inscripciones</a>
                        <a href="{{ route('informes-movimientos-formularios-03') }}" type="button" class="btn btn-primary waves-effect waves-light">Formularios 03</a>
                        <a href="{{ route('informes-movimientos-justificativos-documental') }}" type="button" class="btn btn-primary waves-effect waves-light">Justificativos</a>
                        <a href="{{ route('informes-movimientos-sanciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Sanciones</a>
                        <a href="{{ route('informes-movimientos-deserciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Deserciones</a>
                        <a href="{{ route('informes-movimientos-asistencias-documental') }}" type="button" class="btn btn-primary waves-effect waves-light">Asistencias</a>
                        <a href="{{ route('informes-movimientos-calificaciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Calificaciones</a>
                        <a href="{{ route('informes-movimientos-libreta-calificaciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Libreta de Calificaciones</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Referenciales Academicos</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-referenciales-areas') }}" type="button" class="btn btn-primary waves-effect waves-light">Areas</a>
                        <a href="{{ route('informes-referenciales-asignaturas') }}" type="button" class="btn btn-primary waves-effect waves-light">Asignaturas</a>
                        <a href="{{ route('informes-referenciales-bachilleratos') }}" type="button" class="btn btn-primary waves-effect waves-light">Bachilleratos</a>
                        <a href="{{ route('informes-referenciales-grados') }}" type="button" class="btn btn-primary waves-effect waves-light">Grados</a>
                        <a href="{{ route('informes-referenciales-requisitos') }}" type="button" class="btn btn-primary waves-effect waves-light">Requisitos</a>
                        <a href="{{ route('informes-referenciales-tipos-evaluaciones') }}" type="button" class="btn btn-primary waves-effect waves-light">Tipos de Evaluaciones</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Referenciales Operativos</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-referenciales-ciudades') }}" type="button" class="btn btn-primary waves-effect waves-light">Ciudades</a>
                        <a href="{{ route('informes-referenciales-clausulas') }}" type="button" class="btn btn-primary waves-effect waves-light">Clausulas</a>
                        <a href="{{ route('informes-referenciales-causas') }}" type="button" class="btn btn-primary waves-effect waves-light">Causas</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Referenciales Documentales</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-referenciales-nacionalidades') }}" type="button" class="btn btn-primary waves-effect waves-light">Nacionalidades</a>
                        <a href="{{ route('informes-referenciales-estudiantes') }}" type="button" class="btn btn-primary waves-effect waves-light">Estudiantes</a>
                        <a href="{{ route('informes-referenciales-guardianes') }}" type="button" class="btn btn-primary waves-effect waves-light">Guardianes</a>
                    </div>
                </div>

                <hr>

                <h4 class="card-title">Referenciales de Sistema</h4>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <a href="{{ route('informes-referenciales-sedes') }}" type="button" class="btn btn-primary waves-effect waves-light">Sedes</a>
                        <a href="{{ route('informes-referenciales-usuarios') }}" type="button" class="btn btn-primary waves-effect waves-light">Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
