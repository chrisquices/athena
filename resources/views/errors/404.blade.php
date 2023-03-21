<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | Athena</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
    </head>

    <body data-topbar="dark" data-layout="horizontal">
        <div id="layout-wrapper">
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid text-center">
                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="" width="200px">
                        <hr>

                        <h1>404</h1>
                        <h2>Página no encontrada</h2>

                        <a href="/" class="btn btn-primary btn-sm mt-4"><i class="fa fa-chevron-left me-2"></i> Regresar al inicio</a>
                        @include('layouts.footer')
                    </div>          
                </div>
            </div>    
        </div>
    </body>
</html>
