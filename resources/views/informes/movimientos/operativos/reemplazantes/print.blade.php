<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reemplazantes</title>

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

<br>

<table class="table">
    <thead>
    <tr>
        @isset($columnas['id']) <th>ID</th> @endisset
        @isset($columnas['nombre']) <th>Nombre</th> @endisset
        @isset($columnas['apellido']) <th>Apellido</th> @endisset
        @isset($columnas['direccion']) <th>Direccion</th> @endisset
        @isset($columnas['telefono']) <th>Telefono</th> @endisset
        @isset($columnas['created_at']) <th>Fecha Creacion</th> @endisset
        @isset($columnas['updated_at']) <th>Fecha Actualizacion</th> @endisset
    </tr>

    </thead>
    <tbody>
    @foreach ($registros as $registro)
        <tr>
            @isset($columnas['id']) <td>{{ $registro->id }}</td> @endisset
            @isset($columnas['nombre']) <td>{{ $registro->nombre }}</td> @endisset
            @isset($columnas['apellido']) <td>{{ $registro->apellido }}</td> @endisset
            @isset($columnas['direccion']) <td>{{ $registro->direccion }}</td> @endisset
            @isset($columnas['telefono']) <td>{{ $registro->telefono }}</td> @endisset
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
