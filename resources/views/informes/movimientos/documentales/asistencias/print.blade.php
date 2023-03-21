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
        {{ $plan_curso->sede->nombre }} |
        {{ $plan_curso->grado->nombre }}
        {{ $plan_curso->seccion }}
        {{ $plan_curso->turno }} |
        {{ $plan_curso->bachillerato->acronimo ?? 'SB' }}
    </span>
</h6>

<h6>
    <span>Asignatura:</span>
    <span>
        {{ $asignatura }}
    </span>
</h6>
<hr>

<br>

<table class="table">
    <thead>
    <tr>
        @isset($columnas['id']) <th>ID</th> @endisset
        @isset($columnas['inscripcion_id']) <th>Inscripcion / Estudiante</th> @endisset
        @isset($columnas['fecha']) <th>Fecha</th> @endisset
        @isset($columnas['estado']) <th>Estado</th> @endisset
        @isset($columnas['created_at']) <th>Fecha Creacion</th> @endisset
        @isset($columnas['updated_at']) <th>Fecha Actualizacion</th> @endisset
    </tr>

    </thead>
    <tbody>
    @foreach ($registros as $registro)
        <tr>
            @isset($columnas['id']) <td>{{ $registro->id }}</td> @endisset
            @isset($columnas['inscripcion_id']) <td>{{ $registro->inscripcion->estudiante->nombre }} {{ $registro->inscripcion->estudiante->apellido }}</td> @endisset
            @isset($columnas['fecha']) <td>{{ $registro->fecha }}</td> @endisset
            @isset($columnas['estado']) <td>{{ $registro->estado }}</td> @endisset
            @isset($columnas['created_at']) <td>{{ $registro->created_at }}</td> @endisset
            @isset($columnas['updated_at']) <td>{{ $registro->updated_at }}</td> @endisset
        </tr>
    @endforeach
    </tbody>
</table>

<hr>

<footer>
    <p>Estos justificativos operativos fueron generados el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
</footer>

<script>
    window.print();
</script>
</body>

</html>
