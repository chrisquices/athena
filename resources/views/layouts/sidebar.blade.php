<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-apps">Procesos</li>

                @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Director')

                @if(Request::is('procesos/academicos/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-school"></i>
                        <span key="t-ecommerce">Académicos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('mallas-curriculares-index') }}" key="t-procesos-academicos-mallas-curriculares" @if(Request::is('procesos/academicos/mallas-curriculares/*')) class="mm-active" @endif>
                                Mallas Curriculares
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('calendarios-academicos-index') }}" key="t-procesos-academicos-calendarios-academicos" @if(Request::is('procesos/academicos/calendarios-academicos/*')) class="mm-active" @endif>
                                Calendarios Academicos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('planes-cursos-index') }}" key="t-procesos-academicos-planes-cursos" @if(Request::is('procesos/academicos/planes-cursos/*')) class="mm-active" @endif>
                                Planes de Cursos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('planes-academicos-index') }}" key="t-procesos-academicos-planes-academicos" @if(Request::is('procesos/academicos/planes-academicos/*')) class="mm-active" @endif>
                                Planes Académicos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('horarios-index') }}" key="t-procesos-academicos-horarios" @if(Request::is('procesos/academicos/horarios/*')) class="mm-active" @endif>
                                Horarios de Clase
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('requisitos-inscripciones-index') }}" key="t-procesos-academicos-requisitos-inscripciones" @if(Request::is('procesos/academicos/requisitos-inscripciones/*')) class="mm-active" @endif>
                                Requisitos de Inscripción
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('planes-evaluaciones-index') }}" key="t-procesos-academicos-planes-evaluaciones" @if(Request::is('procesos/academicos/planes-evaluaciones/*')) class="mm-active" @endif>
                                Planes de Evaluaciones
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Request::is('procesos/operativos/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-clipboard"></i>
                        <span key="t-ecommerce">Operativos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('postulantes-index') }}" key="t-procesos-operativos-postulantes" @if(Request::is('procesos/operativos/postulantes/*')) class="mm-active" @endif>
                                Postulantes
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('contratos-index') }}" key="t-procesos-operativos-contratos" @if(Request::is('procesos/operativos/contratos/*')) class="mm-active" @endif>
                                Contratos
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Docente')
                        <li>
                            <a href="{{ route('asistencias-operativo-index') }}" key="t-procesos-operativos-asistencias" @if(Request::is('procesos/operativos/asistencias/*')) class="mm-active" @endif>
                                Asistencias
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Docente')
                        <li>
                            <a href="{{ route('planes-diarios-index') }}" key="t-procesos-operativos-planes-diarios" @if(Request::is('procesos/operativos/planes-diarios/*')) class="mm-active" @endif>
                                Planes Diarios
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('justificativos-operativo-index') }}" key="t-procesos-operativos-justificativos" @if(Request::is('procesos/operativos/justificativos/*')) class="mm-active" @endif>
                                Justificativos
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('permisos-index') }}" key="t-procesos-permisos" @if(Request::is('procesos/operativos/permisos/*')) class="mm-active" @endif>
                                Permisos
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('reemplazantes-index') }}" key="t-procesos-operativos-reemplazantes" @if(Request::is('procesos/operativos/reemplazantes/*')) class="mm-active" @endif>
                                Reemplazantes
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-archive"></i>
                        <span key="t-ecommerce">Documentales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('inscripciones-index') }}" key="t-procesos-operativos-inscripciones" @if(Request::is('procesos/documentales/inscripciones/*')) class="mm-active" @endif>
                                Inscripciones
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('formularios-03-index') }}" key="t-procesos-documentales-formularios-03" @if(Request::is('procesos/documentales/formularios-03/*')) class="mm-active" @endif>
                                Formularios 03
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Docente')
                        <li>
                            <a href="{{ route('asistencias-documental-index') }}" key="t-procesos-documentales-asistencias" @if(Request::is('procesos/documentales/asistencias/*')) class="mm-active" @endif>
                                Asistencias
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('justificativos-documental-index') }}" key="t-procesos-documentales-justificativos" @if(Request::is('procesos/documentales/justificativos/*')) class="mm-active" @endif>
                                Justificativos
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('sanciones-index') }}" key="t-procesos-documentales-sanciones" @if(Request::is('procesos/documentales/sanciones/*')) class="mm-active" @endif>
                                Sanciones
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')
                        <li>
                            <a href="{{ route('deserciones-index') }}" key="t-procesos-documentales-deserciones" @if(Request::is('procesos/documentales/deserciones/*')) class="mm-active" @endif>
                                Deserciones
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'Docente')
                        <li>
                            <a href="{{ route('calificaciones-index') }}" key="t-procesos-documentales-calificaciones" @if(Request::is('procesos/documentales/calificaciones/*')) class="mm-active" @endif>
                                Calificaciones
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                @if(auth()->user()->role == 'Administrador')
                <li class="menu-title" key="t-apps">Mantenimiento y Seguridad</li>

                @if(Request::is('mantenimiento-seguridad/referenciales-academicos/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-school"></i>
                        <span key="t-ecommerce">Ref. Académicos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('areas-index') }}" key="t-ref-academicos-areas" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/areas/*')) class="mm-active" @endif>
                                Áreas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('asignaturas-index') }}" key="t-ref-academicos-asignaturas" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/asignaturas/*')) class="mm-active" @endif>
                                Asignaturas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('bachilleratos-index') }}" key="t-ref-academicos-bachilleratos" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/bachilleratos/*')) class="mm-active" @endif>
                                Bachilleratos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('grados-index') }}" key="t-ref-academicos-grados" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/grados/*')) class="mm-active" @endif>
                                Grados
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('requisitos-index') }}" key="t-ref-academicos-requisitos" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/requisitos/*')) class="mm-active" @endif>
                                Requisitos
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tipos-evaluaciones-index') }}" key="t-ref-academicos-tipos-evaluaciones" @if(Request::is('mantenimiento-seguridad/referenciales-academicos/tipos-evaluaciones/*')) class="mm-active" @endif>
                                Tipos de Evaluaciones
                            </a>
                        </li>
                    </ul>
                </li>


                @if(Request::is('mantenimiento-seguridad/referenciales-operativos/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-school"></i>
                        <span key="t-ecommerce">Ref. Operativos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('ciudades-index') }}" key="t-ref-operativos-ciudades" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/ciudades/*')) class="mm-active" @endif>
                                Ciudades
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clausulas-index') }}" key="t-ref-operativos-clausulas" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/clausulas/*')) class="mm-active" @endif>
                                Clausulas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('causas-index') }}" key="t-ref-operativos-causas" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/causas/*')) class="mm-active" @endif>
                                Causas
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Request::is('mantenimiento-seguridad/referenciales-documentales/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-school"></i>
                        <span key="t-ecommerce">Ref. Documentales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('nacionalidades-index') }}" key="t-ref-operativos-nacionalidades" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/nacionalidades/*')) class="mm-active" @endif>
                                Nacionalidades
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('estudiantes-index') }}" key="t-ref-operativos-estudiantes" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/estudiantes/*')) class="mm-active" @endif>
                                Estudiantes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('guardianes-index') }}" key="t-ref-operativos-guardianes" @if(Request::is('mantenimiento-seguridad/referenciales-operativos/guardianes/*')) class="mm-active" @endif>
                                Guardianes
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Request::is('mantenimiento-seguridad/referenciales-sistema/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-shield-quarter"></i>
                        <span key="t-ecommerce">Ref. Sistema</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('sedes-index') }}" key="t-ref-sistema-sedes" @if(Request::is('mantenimiento-seguridad/referenciales-sistema/sedes/*')) class="mm-active" @endif>
                                Sedes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('usuarios-index') }}" key="t-ref-sistema-usuarios" @if(Request::is('mantenimiento-seguridad/referenciales-sistema/usuarios/*')) class="mm-active" @endif>
                                Usuarios
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->role == 'Administrador' || auth()->user()->role == 'Secretario')

                <li class="menu-title" key="t-apps">Otros</li>

                @if(Request::is('informes/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="{{ route('informes-index') }}" class="waves-effect">
                        <i class="bx bx-printer"></i>
                        <span key="t-informes">Informes</span>
                    </a>
                </li>

                @endif

                @if(Request::is('ayuda/*'))
                <li class="mm-active">
                    @else
                <li>
                    @endif
                    <a href="{{ route('ayuda-index') }}" class="waves-effect">
                        <i class="bx bx-help-circle"></i>
                        <span key="t-ayuda">Ayuda</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>