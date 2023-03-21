<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inicio de Sesión | Athena</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest"') }}>
    <link rel=" mask-icon" href="{{ asset('assets/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#1a3052">
    <meta name="msapplication-TileImage" content="{{ asset('assets/mstile-144x144.png') }}">
    <meta name="theme-color" content="#1a3052">

    <meta property="og:title" content="Athena">
    <meta property="og:site_name" content="Athena">
    <meta property="og:url" content="www.athena.rosphrethic.com">
    <meta property="og:description" content="Sistema de Gestión Academica, Operativa y Documental">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">

    <style>
        html {
            /* background: url('assets/images/bg.jpg') rgba(0, 0, 0, 0.15) no-repeat center center fixed;  */
            background: rgb(25, 49, 82);
            background: linear-gradient(0deg, rgba(25, 49, 82, 1) 0%, rgba(34, 65, 107, 1) 100%);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-blend-mode: multiply;

        }
    </style>
</head>

<body style="background: none !important;">
    <div class="account-pages mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden" style="box-shadow: 0px 0px 10px #EEF3FA;">
                        <div style="background-color: #193152 ;">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="avatar-lg mx-auto mt-4">
                                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="emblema de la institucion">
                                    </div>
                                    <div class="text-white px-4 pt-4 pb-1">
                                        <h5 class="text-white">Athena</h5>
                                        <p>Sistema Académico</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form action="{{ route('login') }}" method="POST" class="form-horizontal">
                                    @csrf

                                    <div class="form-group mt-3 mb-3">
                                        <label for="sede_id">Sede</label>
                                        <select id="sede_id" name="sede_id" class="form-control select2">
                                            @foreach ($sedes as $sede)
                                            <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email">Correo Electrónico</label>
                                        <input id="email" name="email" type="text" class="form-control" value="christopher@rosphrethic.com" autofocus>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input id="password" name="password" type="password" value="52rctku85tEvNSyE" class="form-control">
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"><i class="fa fa-sign-in-alt me-2"></i> Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-advanced.js') }}"></script>

    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @error('email')
    <script>
        $(document).ready(function() {
            toastr.error('Hubo un error, verifique sus credenciales')
        });
    </script>
    @enderror
    @error('password')
    <script>
        $(document).ready(function() {
            toastr.error('Hubo un error, verifique sus credenciales')
        });
    </script>
    @enderror
</body>

</html>