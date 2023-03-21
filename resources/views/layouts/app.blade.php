<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Athena</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/safari-pinned-tab.svg') }}" color="#5bbad5">
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

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
</head>

<body data-topbar="dark">

    <div class="blank-container"></div>

    <div class="progress-bar-container">
        <div class="progress-bar"></div>
    </div>

    <div id="layout-wrapper">

        @include('layouts.topbar')

        @include('layouts.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-advanced.js') }}"></script>

    <script src="{{ asset('assets/libs/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-mask.js') }}"></script>

    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @yield('scripts')


    <script>
        @if(Session::get('success'))
        toastr.success(MESSAGE_SUCCESS);
        @endif

        @if(Session::get('error'))
        toastr.error(MESSAGE_ERROR);
        @endif

        @if(Session::get('baddate'))
        toastr.error('La fecha no puede ser antes de la fecha actual');
        @endif

        @if(Session::get('useddate'))
        toastr.error('La asistencia de esta fecha ya se registro');
        @endif

        @if(Session::get('overponderacion'))
        toastr.error('El puntaje logrado no puede superar la ponderacion');
        @endif

        @if(Session::get('norecords'))
        toastr.error('No existen asistencias con esta fecha');
        @endif

        @if(Session::get('permisos'))
        toastr.error('¡No tienes permisos suficientes para ingresar en esta página!');
        @endif

        @if(Session::get('relations'))
        toastr.error('No puede eliminar una malla curricular actualmente en uso');
        @endif

        @if(Session::get('nopuedeanular'))
        toastr.error('No puede anular este registro');
        @endif

        @if(Session::get('invaliddate'))
        toastr.error('Esta fecha no esta disponible');
        @endif
    </script>
</body>

</html>
