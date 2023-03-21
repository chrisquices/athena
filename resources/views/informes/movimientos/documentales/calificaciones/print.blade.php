<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inscripciones</title>

    @include('layouts.bootstrap')
</head>

<body>
<div id="header" style="">
    <div style="padding: 0px;">
        <div style="display: inline-block; vertical-align:top;">
            <img src="{{ asset('assets/images/logo.png') }}" width="60">
        </div>
        <div style="display: inline-block; margin-left: 25px; margin-top: 7px;">
            <p style="font-weight: bold; font-size: 12px;">Colegio "Las Mercedes" - Administracion</p>
            <p style="font-size: 12px;">{{ $tabla }}</p>
        </div>
    </div>
</div>

<hr class="divider">

<h6>
    <span>Plan de Curso:</span>
    <span>
        {{ $registros[0]->plan_curso->sede->nombre }} |
        {{ $registros[0]->plan_curso->grado->nombre }}
        {{ $registros[0]->plan_curso->seccion }}
        {{ $registros[0]->plan_curso->turno }} |
        {{ $registros[0]->plan_curso->bachillerato->acronimo ?? 'SB' }}
    </span>
</h6>

<h6>
    <span>Asignatura:</span>
    <span>
        {{ $registros[0]->plan_academico->asignatura->nombre }}
    </span>
</h6>
<hr>

@foreach ($registros as $registro)
    <h5>Tema: {{ $registro->tema }} | Etapa {{ $registro->etapa }}</h5>

    <table class="table">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Puntaje Logrado</th>
                <th>Total de Puntos</th>
                <th>Observacion</th>
                <th>Fecha de Examen</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($registro->inscripciones_planes_evaluaciones as $inscripcion_plan_evaluacion)
                <tr>
                    <td>{{ $inscripcion_plan_evaluacion->inscripcion->estudiante->nombre }} {{ $inscripcion_plan_evaluacion->inscripcion->estudiante->apellido }}</td>
                    <td>{{ $inscripcion_plan_evaluacion->puntaje_logrado }}</td>
                    <td>{{ $inscripcion_plan_evaluacion->plan_evaluacion->ponderacion }}</td>
                    <td>{{ $inscripcion_plan_evaluacion->plan_evaluacion->observacion }}</td>
                    <td>{{ $inscripcion_plan_evaluacion->plan_evaluacion->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach

<hr>

<footer>
    <p>Estas calificaciones fueron generados el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
</footer>

<script>
    window.print();
</script>
</body>

</html>
