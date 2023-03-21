<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Resumen de Calificaciones</title>

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
    <span style="font-weight: bold">Plan de Curso:</span>
    <span>
        {{ $plan_curso->sede->nombre }} |
        {{ $plan_curso->grado->nombre }}
        {{ $plan_curso->seccion }}
        {{ $plan_curso->turno }} |
        {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}
    </span>
</h6>

<h6>
    <span style="font-weight: bold">Estudiante:</span>
    <span>
        {{ $inscripcion->estudiante->nombre }}
        {{ $inscripcion->estudiante->apellido }}
    </span>
</h6>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>Asignatura</th>
            <th>Etapa 1</th>
            <th>Etapa 2</th>
            <th>Etapa Final</th>
            <th>Reprobado</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($planes_academicos as $plan_academico)
            <tr>
                <td>{{ $plan_academico->asignatura->nombre }}</td>
                <td>{{ $plan_academico->nota_1 }}</td>
                <td>{{ $plan_academico->nota_2 }}</td>
                <td>{{ $plan_academico->nota_3 }}</td>
                <td>@if ($plan_academico->reprobado_general) Si @else No @endif</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h6>
    <span style="font-weight: bold">Reprobado:</span>
    <span>@if ($plan_academico->reprobado_general) Si @else No @endif</span>
</h6>

<hr>

<footer>
    <p>Estas calificaciones fueron generados el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
</footer>

<script>
    window.print();
</script>
</body>

</html>
