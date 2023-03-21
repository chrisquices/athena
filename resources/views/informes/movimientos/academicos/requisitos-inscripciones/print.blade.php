<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Requisitos de Inscripcion</title>

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
                <p style="font-size: 12px;">Requisitos de Inscripcion</p>
            </div>
        </div>
    </div>

    <hr class="divider">

    <br>

    <p>
        <span class="text-bold">Plan de Curso: </span>
        {{ $plan_curso->sede->nombre }} |
        {{ $plan_curso->grado->nombre }}
        {{ $plan_curso->seccion }}
        {{ $plan_curso->turno }} |
        {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}
    </p>

    <ul>
        @foreach ($requisitos_inscripciones as $requisito_inscripcion)
        <li>{{ $requisito_inscripcion->requisito->nombre }}</li>
        @endforeach
    </ul>

    <footer>
        <p>Este requisito de inscripcion fue generado el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
    </footer>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

    <script>
        window.print();
    </script>
</body>

</html>
