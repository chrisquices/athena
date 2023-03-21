<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $tabla }} - Ficha Academica</title>

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
                @isset($columnas['area_id']) <th>ID</th> @endisset
                @isset($columnas['guardian_id']) <th>Guardian</th> @endisset
                @isset($columnas['nacionalidad_id']) <th>Nacionalidad</th> @endisset
                @isset($columnas['ciudad_id']) <th>Ciudad</th> @endisset
                @isset($columnas['tipo']) <th>Tipo</th> @endisset
                @isset($columnas['nombre']) <th>Nombre</th> @endisset
                @isset($columnas['apellido']) <th>Apellido</th> @endisset
                @isset($columnas['documento_tipo']) <th>Tipo de Documento</th> @endisset
                @isset($columnas['documento_numero']) <th>Numero de Documento</th> @endisset
                @isset($columnas['fecha_nacimiento']) <th>Fecha de Nacimiento</th> @endisset
                @isset($columnas['sexo']) <th>Sexo</th> @endisset
                @isset($columnas['name']) <th>Nombre</th> @endisset
                @isset($columnas['lastname']) <th>Apellido</th> @endisset
                @isset($columnas['role']) <th>Rol</th> @endisset
                @isset($columnas['email']) <th>Correo</th> @endisset
                @isset($columnas['verified']) <th>Verificado</th> @endisset
                @isset($columnas['failed_attempt']) <th>Intentos Fallidos</th> @endisset
                @isset($columnas['nombre_alternativo']) <th>Nombre Alternativo</th> @endisset
                @isset($columnas['nivel']) <th>Nivel</th> @endisset
                @isset($columnas['nivel_acronimo']) <th>Nivel Acronimo</th> @endisset
                @isset($columnas['tiene_bachillerato']) <th>Tiene Bachillerato</th> @endisset
                @isset($columnas['telefono']) <th>Telefono</th> @endisset
                @isset($columnas['direccion']) <th>Direccion</th> @endisset
                @isset($columnas['acronimo']) <th>Acronimo</th> @endisset
                @isset($columnas['estado']) <th>Estado</th> @endisset
                @isset($columnas['created_at']) <th>Fecha Creacion</th> @endisset
                @isset($columnas['updated_at']) <th>Fecha Actualizacion</th> @endisset
            </tr>

        </thead>
        <tbody>
            @foreach ($registros as $registro)
            <tr>
                @isset($columnas['id']) <td>{{ $registro->id }}</td> @endisset
                @isset($columnas['area_id']) <td>{{ $registro->area->nombre }}</td> @endisset
                @isset($columnas['guardian_id']) <td>{{ $registro->guardian->nombre }} {{ $registro->guardian->apellido }}</td> @endisset
                @isset($columnas['nacionalidad_id']) <td>{{ $registro->nacionalidad->nombre }}</td> @endisset
                @isset($columnas['ciudad_id']) <td>{{ $registro->ciudad->nombre }}</td> @endisset
                @isset($columnas['tipo']) <td>{{ $registro->tipo }}</td> @endisset
                @isset($columnas['nombre']) <td>{{ $registro->nombre }}</td> @endisset
                @isset($columnas['apellido']) <td>{{ $registro->apellido }}</td> @endisset
                @isset($columnas['documento_tipo']) <td>{{ $registro->documento_tipo }}</td> @endisset
                @isset($columnas['documento_numero']) <td>{{ $registro->documento_numero }}</td> @endisset
                @isset($columnas['fecha_nacimiento']) <td>{{ $registro->fecha_nacimiento }}</td> @endisset
                @isset($columnas['sexo']) <td>{{ $registro->sexo }}</td> @endisset
                @isset($columnas['name']) <td>{{ $registro->name }}</td> @endisset
                @isset($columnas['lastname']) <td>{{ $registro->lastname }}</td> @endisset
                @isset($columnas['role']) <td>{{ $registro->role }}</td> @endisset
                @isset($columnas['email']) <td>{{ $registro->email }}</td> @endisset
                @isset($columnas['verified']) <td>@if($registro->verified) Si @else No @endif</td> @endisset
                @isset($columnas['failed_attempt']) <td>{{ $registro->failed_attempt }}</td> @endisset
                @isset($columnas['nombre_alternativo']) <td>{{ $registro->nombre_alternativo }}</td> @endisset
                @isset($columnas['nivel']) <td>{{ $registro->nivel }}</td> @endisset
                @isset($columnas['nivel_acronimo']) <td>{{ $registro->nivel_acronimo }}</td> @endisset
                @isset($columnas['tiene_bachillerato']) <td>@if($registro->tiene_bachillerato) Si @else No @endif</td> @endisset
                @isset($columnas['telefono']) <td>{{ $registro->telefono }}</td> @endisset
                @isset($columnas['direccion']) <td>{{ $registro->direccion }}</td> @endisset
                @isset($columnas['acronimo']) <td>{{ $registro->acronimo }}</td> @endisset
                @isset($columnas['estado']) <td>{{ $registro->estado }}</td> @endisset
                @isset($columnas['created_at']) <td>{{ $registro->created_at }}</td> @endisset
                @isset($columnas['updated_at']) <td>{{ $registro->updated_at }}</td> @endisset
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <footer>
        <p>Esta ficha academica fue generada el <span class="text-primary">{{ date('Y-m-d') }} {{ date('g:i A') }}</span>.</p>
    </footer>

    <script>
        window.print();
    </script>
</body>

</html>
