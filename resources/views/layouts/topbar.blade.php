<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-text3.png') }}" alt="" height="34">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-text3.png') }}" alt="" height="34">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://drive.google.com">
                                    <img src="{{ asset('assets/images/icons/google-drive.svg') }}" alt="Google Drive">
                                    <span>Drive</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://mail.google.com">
                                    <img src="{{ asset('assets/images/icons/gmail.svg') }}" alt="Google Mail - Gmail">
                                    <span>Gmail</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://hangouts.google.com/">
                                    <img src="{{ asset('assets/images/icons/google-hangouts.svg') }}" alt="Google Hangouts">
                                    <span>Hangouts</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/document">
                                    <img src="{{ asset('assets/images/icons/google-docs.svg') }}" alt="Google Docs">
                                    <span>Docs</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/spreadsheets">
                                    <img src="{{ asset('assets/images/icons/google-sheets.svg') }}" alt="Google Sheets">
                                    <span>Sheets</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://docs.google.com/presentation">
                                    <img src="{{ asset('assets/images/icons/google-slides.svg') }}" alt="Google Slides">
                                    <span>Slides</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://facebook.com">
                                    <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="Facebook">
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://instagram.com">
                                    <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="Instagram">
                                    <span>Instagram</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://web.whatsapp.com">
                                    <img src="{{ asset('assets/images/icons/whatsapp.svg') }}" alt="WhatsApp">
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="topbar-profile-photo" class="rounded-circle header-profile-user" src="{{ asset('storage/users/' . Auth::user()->photo) }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2" key="t-username">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/general/profile"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Mi Perfil</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout">Cerrar Sesión</span>
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
                </div>
            </div>

        </div>
    </div>
</header>
