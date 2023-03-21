<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Plan Academico</title>
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
                <p style="font-size: 12px;">Planes Academicos</p>
            </div>
        </div>
    </div>

    <hr class="divider">

    <br>

    <p>
        <span class="text-bold">Curso: </span>
        {{ $planes_academicos[0]->plan_curso->sede->nombre }} |
        {{ $planes_academicos[0]->plan_curso->grado->nombre }}
        {{ $planes_academicos[0]->plan_curso->seccion }}
        {{ $planes_academicos[0]->plan_curso->turno }} |
        {{ $planes_academicos[0]->plan_curso->bachillerato->acronimo ?? 'SB' }}
    </p>

    <hr>

    @foreach ($planes_academicos as $plan_academico)

    <p>
        <span class="text-bold">Asignatura: </span>
        {{ $plan_academico->asignatura->nombre }}
    </p>

    <p>
        <span class="text-bold">Modalidad: </span>
        {{ $plan_academico->modalidad }}
    </p>


    <p>
        <span class="text-bold">Alcances: </span>
        {!! $plan_academico->alcances !!}
    </p>

    <p>
        <span class="text-bold">Contenidos: </span>
        {!! $plan_academico->contenidos !!}
    </p>

    <p>
        <span class="text-bold">Actividades: </span>
        {!! $plan_academico->actividades !!}
    </p>

    <p>
        <span class="text-bold">Instrumentos: </span>
        {!! $plan_academico->instrumentos !!}
    </p>

    <hr>

    @endforeach

    <footer>
        <p>Este plan academico fue generado el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
    </footer>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

    <script>
        window.print();
    </script>
</body>

</html>
