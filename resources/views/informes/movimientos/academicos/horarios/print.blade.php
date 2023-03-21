<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Horario de Clase</title>

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
                <p style="font-size: 12px;">Horario de Clase</p>
            </div>
        </div>
    </div>

    <hr class="divider">

    <br>

    <p>
        <span class="text-bold">Plan de Curso: </span>
        {{ $plan_curso->sede->acronimo }} |
        {{ $plan_curso->grado->nombre }}
        {{ $plan_curso->seccion }}
        {{ $plan_curso->turno }} |
        {{ $plan_curso->bachillerata->acronimo ?? 'SB' }}
    </p>

    @foreach($horarios as $horario)
    <p>
        <span class="text-bold">{{ $horario->dia }}: </span>
    </p>

    <table id="datatable" class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Horario</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($horario->detalle as $detalle)
            <tr>
                <td>{{ $detalle->hora }}°</td>
                <td>{{ $detalle->asignatura->nombre }}</td>
                <td>{{ $detalle->contrato->postulante->nombre ?? '-'}} {{ $detalle->contrato->postulante->apellido ?? ''}}</td>
                <td>{{ $detalle->hora_desde }} - {{ $detalle->hora_hasta }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endforeach

    <footer>
        <p>Este plan de curso fue generada el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
    </footer>

    <script>
        window.print();
    </script>
</body>

</html>
