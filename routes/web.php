<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsistenciaDocumentalController;
use App\Http\Controllers\AsistenciaOperativoController;
use App\Http\Controllers\BachilleratoController;
use App\Http\Controllers\CausaController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ClausulaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DesercionController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\Formulario03Controller;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarioAcademicoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\InformeReferencialController;
use App\Http\Controllers\InformeMovimientoAcademicoController;
use App\Http\Controllers\InformeMovimientoOperativoController;
use App\Http\Controllers\InformeMovimientoDocumentalController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\AyudaController;
use App\Http\Controllers\JustificativoDocumentalController;
use App\Http\Controllers\JustificativoOperativoController;
use App\Http\Controllers\MallaCurricularController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PlanAcademicoController;
use App\Http\Controllers\PlanCursoController;
use App\Http\Controllers\PlanDiarioController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\PlanEvaluacionController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\ReemplazanteController;
use App\Http\Controllers\RequisitoController;
use App\Http\Controllers\RequisitoInscripcionController;
use App\Http\Controllers\SancionController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TipoEvaluacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalificacionController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('logout', 'LoginController@logout');

				Route::get('/check-calendario-academico', [AsistenciaDocumentalController::class, 'checkCalendarioAcademico']);


				Route::prefix('/get')->group(function () {
        Route::get('/asignaturas', [HelperController::class, 'getAsignaturas']);
        Route::get('/planes-cursos', [HelperController::class, 'getPlanesCursos']);
        Route::get('/planes-academicos', [HelperController::class, 'getPlanesAcademicos']);
    });

				Route::group(['prefix' => '/mantenimiento-seguridad', 'middleware' => ['administrador']], function(){

        Route::prefix('/referenciales-academicos')->group(function () {

            Route::prefix('/areas')->group(function () {
                Route::get('/', [AreaController::class, 'index'])->name('areas-index');
                Route::get('/create', [AreaController::class, 'create'])->name('areas-create');
                Route::post('/store', [AreaController::class, 'store'])->name('areas-store');
                Route::get('/{area}', [AreaController::class, 'show'])->name('areas-show');
                Route::get('/{area}/edit', [AreaController::class, 'edit'])->name('areas-edit');
                Route::patch('/{area}/update', [AreaController::class, 'update'])->name('areas-update');
                Route::get('/{area}/delete', [AreaController::class, 'delete'])->name('areas-delete');
            });

            Route::prefix('/asignaturas')->group(function () {
                Route::get('/', [AsignaturaController::class, 'index'])->name('asignaturas-index');
                Route::get('/create', [AsignaturaController::class, 'create'])->name('asignaturas-create');
                Route::post('/store', [AsignaturaController::class, 'store'])->name('asignaturas-store');
                Route::get('/{asignatura}', [AsignaturaController::class, 'show'])->name('asignaturas-show');
                Route::get('/{asignatura}/edit', [AsignaturaController::class, 'edit'])->name('asignaturas-edit');
                Route::patch('/{asignatura}/update', [AsignaturaController::class, 'update'])->name('asignaturas-update');
                Route::get('/{asignatura}/delete', [AsignaturaController::class, 'delete'])->name('asignaturas-delete');
            });

            Route::prefix('/bachilleratos')->group(function () {

                Route::get('/', [BachilleratoController::class, 'index'])->name('bachilleratos-index');
                Route::get('/create', [BachilleratoController::class, 'create'])->name('bachilleratos-create');
                Route::post('/store', [BachilleratoController::class, 'store'])->name('bachilleratos-store');
                Route::get('/{bachillerato}', [BachilleratoController::class, 'show'])->name('bachilleratos-show');
                Route::get('/{bachillerato}/edit', [BachilleratoController::class, 'edit'])->name('bachilleratos-edit');
                Route::patch('/{bachillerato}/update', [BachilleratoController::class, 'update'])->name('bachilleratos-update');
                Route::get('/{bachillerato}/delete', [BachilfleratoController::class, 'delete'])->name('bachilleratos-delete');
            });

            Route::prefix('/requisitos')->group(function () {

                Route::get('/', [RequisitoController::class, 'index'])->name('requisitos-index');
                Route::get('/create', [RequisitoController::class, 'create'])->name('requisitos-create');
                Route::post('/store', [RequisitoController::class, 'store'])->name('requisitos-store');
                Route::get('/{requisito}', [RequisitoController::class, 'show'])->name('requisitos-show');
                Route::get('/{requisito}/edit', [RequisitoController::class, 'edit'])->name('requisitos-edit');
                Route::patch('/{requisito}/update', [RequisitoController::class, 'update'])->name('requisitos-update');
                Route::get('/{requisito}/delete', [RequisitoController::class, 'delete'])->name('requisitos-delete');
            });

            Route::prefix('/grados')->group(function () {

                Route::get('/', [GradoController::class, 'index'])->name('grados-index');
                Route::get('/create', [GradoController::class, 'create'])->name('grados-create');
                Route::post('/store', [GradoController::class, 'store'])->name('grados-store');
                Route::get('/{grado}', [GradoController::class, 'show'])->name('grados-show');
                Route::get('/{grado}/edit', [GradoController::class, 'edit'])->name('grados-edit');
                Route::patch('/{grado}/update', [GradoController::class, 'update'])->name('grados-update');
                Route::get('/{grado}/delete', [GradoController::class, 'delete'])->name('grados-delete');
            });

            Route::prefix('/tipos-evaluaciones')->group(function () {

                Route::get('/', [TipoEvaluacionController::class, 'index'])->name('tipos-evaluaciones-index');
                Route::get('/create', [TipoEvaluacionController::class, 'create'])->name('tipos-evaluaciones-create');
                Route::post('/store', [TipoEvaluacionController::class, 'store'])->name('tipos-evaluaciones-store');
                Route::get('/{tipo_evaluacion}', [TipoEvaluacionController::class, 'show'])->name('tipos-evaluaciones-show');
                Route::get('/{tipo_evaluacion}/edit', [TipoEvaluacionController::class, 'edit'])->name('tipos-evaluaciones-edit');
                Route::patch('/{tipo_evaluacion}/update', [TipoEvaluacionController::class, 'update'])->name('tipos-evaluaciones-update');
                Route::get('/{tipo_evaluacion}/delete', [TipoEvaluacionController::class, 'delete'])->name('tipos-evaluaciones-delete');
            });
        });

        Route::prefix('/referenciales-operativos')->group(function () {

            Route::prefix('/ciudades')->group(function () {

                Route::get('/', [CiudadController::class, 'index'])->name('ciudades-index');
                Route::get('/create', [CiudadController::class, 'create'])->name('ciudades-create');
                Route::post('/store', [CiudadController::class, 'store'])->name('ciudades-store');
                Route::get('/{ciudad}', [CiudadController::class, 'show'])->name('ciudades-show');
                Route::get('/{ciudad}/edit', [CiudadController::class, 'edit'])->name('ciudades-edit');
                Route::patch('/{ciudad}/update', [CiudadController::class, 'update'])->name('ciudades-update');
                Route::get('/{ciudad}/delete', [CiudadController::class, 'delete'])->name('ciudades-delete');
            });

            Route::prefix('/clausulas')->group(function () {
                Route::get('/', [ClausulaController::class, 'index'])->name('clausulas-index');
                Route::get('/create', [ClausulaController::class, 'create'])->name('clausulas-create');
                Route::post('/store', [ClausulaController::class, 'store'])->name('clausulas-store');
                Route::get('/{clausula}', [ClausulaController::class, 'show'])->name('clausulas-show');
                Route::get('/{clausula}/edit', [ClausulaController::class, 'edit'])->name('clausulas-edit');
                Route::patch('/{clausula}/update', [ClausulaController::class, 'update'])->name('clausulas-update');
                Route::get('/{clausula}/delete', [ClausulaController::class, 'delete'])->name('clausulas-delete');
            });

            Route::prefix('/causas')->group(function () {

                Route::get('/', [CausaController::class, 'index'])->name('causas-index');
                Route::get('/create', [CausaController::class, 'create'])->name('causas-create');
                Route::post('/store', [CausaController::class, 'store'])->name('causas-store');
                Route::get('/{causa}', [CausaController::class, 'show'])->name('causas-show');
                Route::get('/{causa}/edit', [CausaController::class, 'edit'])->name('causas-edit');
                Route::patch('/{causa}/update', [CausaController::class, 'update'])->name('causas-update');
                Route::get('/{causa}/delete', [CausaController::class, 'delete'])->name('causas-delete');
            });
        });

        Route::prefix('/referenciales-documentales')->group(function () {

            Route::prefix('/nacionalidades')->group(function () {

                Route::get('/', [NacionalidadController::class, 'index'])->name('nacionalidades-index');
                Route::get('/create', [NacionalidadController::class, 'create'])->name('nacionalidades-create');
                Route::post('/store', [NacionalidadController::class, 'store'])->name('nacionalidades-store');
                Route::get('/{nacionalidad}', [NacionalidadController::class, 'show'])->name('nacionalidades-show');
                Route::get('/{nacionalidad}/edit', [NacionalidadController::class, 'edit'])->name('nacionalidades-edit');
                Route::patch('/{nacionalidad}/update', [NacionalidadController::class, 'update'])->name('nacionalidades-update');
                Route::get('/{nacionalidad}/delete', [NacionalidadController::class, 'delete'])->name('nacionalidades-delete');
            });

            Route::prefix('/estudiantes')->group(function () {
                Route::get('/', [EstudianteController::class, 'index'])->name('estudiantes-index');
                Route::get('/create', [EstudianteController::class, 'create'])->name('estudiantes-create');
                Route::post('/store', [EstudianteController::class, 'store'])->name('estudiantes-store');
                Route::get('/{estudiante}', [EstudianteController::class, 'show'])->name('estudiantes-show');
                Route::get('/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes-edit');
                Route::patch('/{estudiante}/update', [EstudianteController::class, 'update'])->name('estudiantes-update');
                Route::get('/{estudiante}/delete', [EstudianteController::class, 'delete'])->name('estudiantes-delete');
            });

            Route::prefix('/guardianes')->group(function () {

                Route::get('/', [GuardianController::class, 'index'])->name('guardianes-index');
                Route::get('/create', [GuardianController::class, 'create'])->name('guardianes-create');
                Route::post('/store', [GuardianController::class, 'store'])->name('guardianes-store');
                Route::get('/{guardian}', [GuardianController::class, 'show'])->name('guardianes-show');
                Route::get('/{guardian}/edit', [GuardianController::class, 'edit'])->name('guardianes-edit');
                Route::patch('/{guardian}/update', [GuardianController::class, 'update'])->name('guardianes-update');
                Route::get('/{guardian}/delete', [GuardianController::class, 'delete'])->name('guardianes-delete');
            });
        });

        Route::prefix('/referenciales-sistema')->group(function () {

            Route::prefix('/sedes')->group(function () {

                Route::get('/', [SedeController::class, 'index'])->name('sedes-index');
                Route::get('/create', [SedeController::class, 'create'])->name('sedes-create');
                Route::post('/store', [SedeController::class, 'store'])->name('sedes-store');
                Route::get('/{sede}', [SedeController::class, 'show'])->name('sedes-show');
                Route::get('/{sede}/edit', [SedeController::class, 'edit'])->name('sedes-edit');
                Route::patch('/{sede}/update', [SedeController::class, 'update'])->name('sedes-update');
                Route::get('/{sede}/delete', [SedeController::class, 'delete'])->name('sedes-delete');
            });

            Route::prefix('/usuarios')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('usuarios-index');
                Route::get('/create', [UserController::class, 'create'])->name('usuarios-create');
                Route::post('/store', [UserController::class, 'store'])->name('usuarios-store');
                Route::get('/{user}', [UserController::class, 'show'])->name('usuarios-show');
                Route::get('/{user}/edit', [UserController::class, 'edit'])->name('usuarios-edit');
                Route::patch('/{user}/update', [UserController::class, 'update'])->name('usuarios-update');
                Route::get('/{user}/delete', [UserController::class, 'delete'])->name('usuarios-delete');
                Route::get('/{user}/reset', [UserController::class, 'reset'])->name('usuarios-reset');
                Route::get('/{user}/block', [UserController::class, 'block'])->name('usuarios-block');
                Route::get('/{user}/unblock', [UserController::class, 'unblock'])->name('usuarios-unblock');

                Route::get('/{user}/assign', [UserController::class, 'assign'])->name('usuarios-assign');
                Route::post('/{user}/assign/store', [UserController::class, 'assignStore'])->name('usuarios-assign-store');

                //                Route::get('/{user}/unassign', [UserController::class, 'unassign'])->name('usuarios-unassign');
                //                Route::post('/{user}/unassign/store', [UserController::class, 'unassignStore'])->name('usuarios-unassign-store');
            });
        });
    });

    Route::prefix('/procesos')->group(function () {

								Route::group(['prefix' => '/academicos', 'middleware' => ['secretario']], function(){

												Route::prefix('/mallas-curriculares')->group(function () {

																Route::get('/', [MallaCurricularController::class, 'index'])->name('mallas-curriculares-index');
																Route::get('/create', [MallaCurricularController::class, 'create'])->name('mallas-curriculares-create');
																Route::post('/store', [MallaCurricularController::class, 'store'])->name('mallas-curriculares-store');
																Route::get('/{malla_curricular}/print', [MallaCurricularController::class, 'print'])->name('mallas-curriculares-print');
																Route::get('/{malla_curricular}/anull', [MallaCurricularController::class, 'anull'])->name('mallas-curriculares-anull');
																Route::get('/reload-table', [MallaCurricularController::class, 'reloadTable']);
												});

												Route::prefix('/calendarios-academicos')->group(function () {

																Route::get('/', [CalendarioAcademicoController::class, 'index'])->name('calendarios-academicos-index');
																Route::get('/create', [CalendarioAcademicoController::class, 'create'])->name('calendarios-academicos-create');
																Route::post('/store', [CalendarioAcademicoController::class, 'store'])->name('calendarios-academicos-store');
																Route::get('/{calendario_academico}', [CalendarioAcademicoController::class, 'show'])->name('calendarios-academicos-show');
																Route::get('/{calendario_academico}/edit', [CalendarioAcademicoController::class, 'edit'])->name('calendarios-academicos-edit');
																Route::patch('/{calendario_academico}/update', [CalendarioAcademicoController::class, 'update'])->name('calendarios-academicos-update');
																Route::get('/{calendario_academico}/delete', [CalendarioAcademicoController::class, 'delete'])->name('calendarios-academicos-delete');

																Route::get('/get/calendarios-academicos', [CalendarioAcademicoController::class, 'getCalendariosAcademicos']);
												});

            Route::prefix('/planes-cursos')->group(function () {

																Route::get('/finalizar', [PlanCursoController::class, 'finalizar']);

																Route::get('/', [PlanCursoController::class, 'index'])->name('planes-cursos-index');
                Route::get('/create', [PlanCursoController::class, 'create'])->name('planes-cursos-create');
                Route::post('/store', [PlanCursoController::class, 'store'])->name('planes-cursos-store');
                Route::get('/{plan_curso}', [PlanCursoController::class, 'show'])->name('planes-cursos-show');
                Route::get('/{plan_curso}/edit', [PlanCursoController::class, 'edit'])->name('planes-cursos-edit');
                Route::patch('/{plan_curso}/update', [PlanCursoController::class, 'update'])->name('planes-cursos-update');
                Route::get('/{plan_curso}/anull', [PlanCursoController::class, 'anull'])->name('planes-cursos-anull');
                Route::get('/{plan_curso}/print', [PlanCursoController::class, 'print'])->name('planes-cursos-print');
            });

            Route::prefix('/planes-academicos')->group(function () {

                Route::get('/', [PlanAcademicoController::class, 'index'])->name('planes-academicos-index');
                Route::get('/create', [PlanAcademicoController::class, 'create'])->name('planes-academicos-create');
                Route::post('/store', [PlanAcademicoController::class, 'store'])->name('planes-academicos-store');
                Route::get('/{plan_academico}', [PlanAcademicoController::class, 'show'])->name('planes-academicos-show');
                Route::get('/{plan_academico}/edit', [PlanAcademicoController::class, 'edit'])->name('planes-academicos-edit');
                Route::patch('/{plan_academico}/update', [PlanAcademicoController::class, 'update'])->name('planes-academicos-update');
                Route::get('/{plan_academico}/anull ', [PlanAcademicoController::class, 'anull'])->name('planes-academicos-anull ');
                Route::get('/{plan_academico}/print', [PlanAcademicoController::class, 'print'])->name('planes-academicos-print');

                Route::get('/get/planes-academicos', [PlanAcademicoController::class, 'getPlanesAcademicos']);
                Route::get('/get/asignatura', [PlanAcademicoController::class, 'getAsignatura']);
                Route::get('/get/asignaturas', [PlanAcademicoController::class, 'getAsignaturas']);
            });

            Route::prefix('/horarios')->group(function () {

                Route::get('/', [HorarioController::class, 'index'])->name('horarios-index');
                Route::get('/create', [HorarioController::class, 'create'])->name('horarios-create');
                Route::post('/store', [HorarioController::class, 'store'])->name('horarios-store');
                Route::get('/{horario}', [HorarioController::class, 'show'])->name('horarios-show');
                Route::get('/{horario}/edit', [HorarioController::class, 'edit'])->name('horarios-edit');
                Route::patch('/{horario}/update', [HorarioController::class, 'update'])->name('horarios-update');
                Route::get('/{plan_curso}/print', [HorarioController::class, 'print'])->name('horarios-print');

                Route::get('/get/dias', [HorarioController::class, 'getDias']);
                Route::get('/get/asignaturas', [HorarioController::class, 'getAsignaturas']);
                Route::get('/get/horarios', [HorarioController::class, 'getHorarios']);
            });

            Route::prefix('/requisitos-inscripciones')->group(function () {

                Route::get('/', [RequisitoInscripcionController::class, 'index'])->name('requisitos-inscripciones-index');
                Route::get('/create', [RequisitoInscripcionController::class, 'create'])->name('requisitos-inscripciones-create');
                Route::post('/store', [RequisitoInscripcionController::class, 'store'])->name('requisitos-inscripciones-store');
                Route::get('/{plan_curso}', [RequisitoInscripcionController::class, 'show'])->name('requisitos-inscripciones-show');
                Route::get('/{plan_curso}/edit', [RequisitoInscripcionController::class, 'edit'])->name('requisitos-inscripciones-edit');
                Route::patch('/{plan_curso}/update', [RequisitoInscripcionController::class, 'update'])->name('requisitos-inscripciones-update');
                Route::get('/{plan_curso}/print', [RequisitoInscripcionController::class, 'print'])->name('requisitos-inscripciones-print');

                Route::get('/get/requisitos-inscripciones', [RequisitoInscripcionController::class, 'getRequisitosInscripciones']);
            });

            Route::prefix('/planes-evaluaciones')->group(function () {

                Route::get('/', [PlanEvaluacionController::class, 'index'])->name('planes-evaluaciones-index');
                Route::get('/create', [PlanEvaluacionController::class, 'create'])->name('planes-evaluaciones-create');
                Route::post('/store', [PlanEvaluacionController::class, 'store'])->name('planes-evaluaciones-store');
                Route::get('/{plan_evaluacion}', [PlanEvaluacionController::class, 'show'])->name('planes-evaluaciones-show');
                Route::get('/{plan_evaluacion}/edit', [PlanEvaluacionController::class, 'edit'])->name('planes-evaluaciones-edit');
                Route::patch('/{plan_evaluacion}/update', [PlanEvaluacionController::class, 'update'])->name('planes-evaluaciones-update');
                Route::get('/{plan_evaluacion}/anull', [PlanEvaluacionController::class, 'anull'])->name('planes-evaluaciones-anull');

                Route::get('/get/planes-evaluaciones', [PlanEvaluacionController::class, 'getPlanesEvaluaciones']);
                Route::get('/get/planes-academicos', [PlanEvaluacionController::class, 'getPlanesAcademicos']);
                Route::get('/get/tipos-evaluaciones', [PlanEvaluacionController::class, 'getTiposEvaluaciones']);
																Route::get('/get/inscripciones', [PlanEvaluacionController::class, 'getInscripciones']);
												});
        });

        Route::prefix('/operativos')->group(function () {

												Route::group(['prefix' => '/postulantes', 'middleware' => ['secretario']], function(){

                Route::get('/', [PostulanteController::class, 'index'])->name('postulantes-index');
                Route::get('/create', [PostulanteController::class, 'create'])->name('postulantes-create');
                Route::post('/store', [PostulanteController::class, 'store'])->name('postulantes-store');
                Route::get('/{postulante}', [PostulanteController::class, 'show'])->name('postulantes-show');
                Route::get('/{postulante}/edit', [PostulanteController::class, 'edit'])->name('postulantes-edit');
                Route::patch('/{postulante}/update', [PostulanteController::class, 'update'])->name('postulantes-update');
                Route::get('/{postulante}/delete', [PostulanteController::class, 'delete'])->name('postulantes-delete');
            });

												Route::group(['prefix' => '/contratos', 'middleware' => ['secretario']], function(){

                Route::get('/', [ContratoController::class, 'index'])->name('contratos-index');
                Route::get('/create', [ContratoController::class, 'create'])->name('contratos-create');
                Route::post('/store', [ContratoController::class, 'store'])->name('contratos-store');
                Route::get('/{contrato}/print', [ContratoController::class, 'print'])->name('contratos-print');
                Route::get('/{contrato}/anull', [ContratoController::class, 'anull'])->name('contratos-anull');
                Route::get('/get/asignaturas', [ContratoController::class, 'getAsignaturas']);
            });

												Route::group(['prefix' => '/asistencias', 'middleware' => ['docente']], function(){

                Route::get('/', [AsistenciaOperativoController::class, 'index'])->name('asistencias-operativo-index');
                Route::post('/check', [AsistenciaOperativoController::class, 'store'])->name('asistencias-operativo-check');
																Route::get('/get/horarios', [AsistenciaOperativoController::class, 'getHorarios']);
																Route::get('/get/reemplazantes', [AsistenciaOperativoController::class, 'getReemplazantes']);
            });

												Route::group(['prefix' => '/planes-diarios', 'middleware' => ['docente']], function(){

                Route::get('/', [PlanDiarioController::class, 'index'])->name('planes-diarios-index');
                Route::get('/create', [PlanDiarioController::class, 'create'])->name('planes-diarios-create');
                Route::post('/store', [PlanDiarioController::class, 'store'])->name('planes-diarios-store');
																Route::get('/{plan_diario}', [PlanDiarioController::class, 'subIndex'])->name('planes-diarios-subindex');
																Route::get('/{plan_diario}/print/x', [PlanDiarioController::class, 'print'])->name('planes-diarios-print');

																Route::get('/{plan_diario}/create', [PlanDiarioController::class, 'subCreate'])->name('planes-diarios-subcreate');
																Route::post('/{plan_diario}/store', [PlanDiarioController::class, 'subStore'])->name('planes-diarios-substore');
																Route::get('/{plan_diario}/{plan_diario_detalle}', [PlanDiarioController::class, 'show'])->name('planes-diarios-show');

																Route::get('/get/planes-diarios/x', [PlanDiarioController::class, 'getPlanesDiarios']);

												});

												Route::group(['prefix' => '/justificativos', 'middleware' => ['secretario']], function(){

                Route::get('/', [JustificativoOperativoController::class, 'index'])->name('justificativos-operativo-index');
                Route::get('/create', [JustificativoOperativoController::class, 'create'])->name('justificativos-operativo-create');
                Route::post('/store', [JustificativoOperativoController::class, 'store'])->name('justificativos-operativo-store');
                Route::get('/{justificativo_operativo}', [JustificativoOperativoController::class, 'show'])->name('justificativos-operativo-show');
                Route::get('/{justificativo_operativo}/anull', [JustificativoOperativoController::class, 'anull'])->name('justificativos-operativo-anull');

                Route::get('/get/justificativos', [JustificativoOperativoController::class, 'getJustificativos']);
                Route::get('/get/ausencias', [JustificativoOperativoController::class, 'getAusencias']);
            });

												Route::group(['prefix' => '/permisos', 'middleware' => ['secretario']], function(){

                Route::get('/', [PermisoController::class, 'index'])->name('permisos-index');
                Route::get('/create', [PermisoController::class, 'create'])->name('permisos-create');
                Route::post('/store', [PermisoController::class, 'store'])->name('permisos-store');
                Route::get('/{permiso}', [PermisoController::class, 'show'])->name('permisos-show');
                Route::get('/{permiso}/edit', [PermisoController::class, 'edit'])->name('permisos-edit');
                Route::patch('/{permiso}/update', [PermisoController::class, 'update'])->name('permisos-update');
                Route::get('/{permiso}/anull', [PermisoController::class, 'anull'])->name('permisos-anull');

                Route::get('/get/permisos', [PermisoController::class, 'getPermisos']);
                Route::get('/get/horarios', [PermisoController::class, 'getHorarios']);
            });

												Route::group(['prefix' => '/reemplazantes', 'middleware' => ['secretario']], function(){

                Route::get('/', [ReemplazanteController::class, 'index'])->name('reemplazantes-index');
                Route::get('/create', [ReemplazanteController::class, 'create'])->name('reemplazantes-create');
                Route::post('/store', [ReemplazanteController::class, 'store'])->name('reemplazantes-store');
                Route::get('/{reemplazante}', [ReemplazanteController::class, 'show'])->name('reemplazantes-show');
                Route::get('/{reemplazante}/edit', [ReemplazanteController::class, 'edit'])->name('reemplazantes-edit');
                Route::patch('/{reemplazante}/update', [ReemplazanteController::class, 'update'])->name('reemplazantes-update');
                Route::get('/{reemplazante}/delete', [ReemplazanteController::class, 'delete'])->name('reemplazantes-delete');
            });
        });

        Route::prefix('/documentales')->group(function () {

												Route::group(['prefix' => '/inscripciones', 'middleware' => ['secretario']], function(){

                Route::get('/', [InscripcionController::class, 'index'])->name('inscripciones-index');
                Route::get('/create', [InscripcionController::class, 'create'])->name('inscripciones-create');
                Route::post('/store', [InscripcionController::class, 'store'])->name('inscripciones-store');
                Route::get('/{inscripcion}', [InscripcionController::class, 'show'])->name('inscripciones-show');
                Route::get('/{inscripcion}/edit', [InscripcionController::class, 'edit'])->name('inscripciones-edit');
                Route::patch('/{inscripcion}/update', [InscripcionController::class, 'update'])->name('inscripciones-update');
                Route::get('/{inscripcion}/anull', [InscripcionController::class, 'anull'])->name('inscripciones-anull');
                Route::get('/{inscripcion}/print', [InscripcionController::class, 'print'])->name('inscripciones-print');

                Route::get('/get/inscripciones', [InscripcionController::class, 'getInscripciones']);
            });

												Route::group(['prefix' => '/formularios-03', 'middleware' => ['secretario']], function(){

                Route::get('/', [Formulario03Controller::class, 'index'])->name('formularios-03-index');
                Route::get('/{plan_curso}/print', [Formulario03Controller::class, 'print'])->name('formularios-03-print');
            });

												Route::group(['prefix' => '/asistencias', 'middleware' => ['docente']], function(){

                Route::get('/', [AsistenciaDocumentalController::class, 'index'])->name('asistencias-documental-index');
                Route::post('/store', [AsistenciaDocumentalController::class, 'store'])->name('asistencias-documental-store');
                Route::patch('/update', [AsistenciaDocumentalController::class, 'update'])->name('asistencias-documental-update');

                Route::get('/get/asignaturas', [AsistenciaDocumentalController::class, 'getAsignaturas']);
                Route::get('/get/inscripciones', [AsistenciaDocumentalController::class, 'getInscripciones']);
            });

												Route::group(['prefix' => '/justificativos', 'middleware' => ['secretario']], function(){

                Route::get('/', [JustificativoDocumentalController::class, 'index'])->name('justificativos-documental-index');
                Route::get('/create', [JustificativoDocumentalController::class, 'create'])->name('justificativos-documental-create');
                Route::post('/store', [JustificativoDocumentalController::class, 'store'])->name('justificativos-documental-store');
                Route::get('/{justificativo_documental}', [JustificativoDocumentalController::class, 'show'])->name('justificativos-documental-show');
                Route::get('/{justificativo_documental}/edit', [JustificativoDocumentalController::class, 'edit'])->name('justificativos-documental-edit');
                Route::patch('/{justificativo_documental}/update', [JustificativoDocumentalController::class, 'update'])->name('justificativos-documental-update');
                Route::get('/{justificativo_documental}/anull', [JustificativoDocumentalController::class, 'anull'])->name('justificativos-documental-anull');

                Route::get('/get/justificativos', [JustificativoDocumentalController::class, 'getJustificativos']);
                Route::get('/get/ausencias', [JustificativoDocumentalController::class, 'getAusencias']);
            });

												Route::group(['prefix' => '/sanciones', 'middleware' => ['secretario']], function(){

                Route::get('/', [SancionController::class, 'index'])->name('sanciones-index');
                Route::get('/create', [SancionController::class, 'create'])->name('sanciones-create');
                Route::post('/store', [SancionController::class, 'store'])->name('sanciones-store');
                Route::get('/{sancion}', [SancionController::class, 'show'])->name('sanciones-show');
                Route::get('/{sancion}/edit', [SancionController::class, 'edit'])->name('sanciones-edit');
                Route::patch('/{sancion}/update', [SancionController::class, 'update'])->name('sanciones-update');
                Route::get('/{sancion}/anull', [SancionController::class, 'anull'])->name('sanciones-anull');

                Route::get('/get/sanciones', [SancionController::class, 'getSanciones']);
            });

												Route::group(['prefix' => '/deserciones', 'middleware' => ['secretario']], function(){

                Route::get('/', [DesercionController::class, 'index'])->name('deserciones-index');
                Route::get('/create', [DesercionController::class, 'create'])->name('deserciones-create');
                Route::post('/store', [DesercionController::class, 'store'])->name('deserciones-store');
                Route::get('/{desercion}', [DesercionController::class, 'show'])->name('deserciones-show');
                Route::get('/{desercion}/edit', [DesercionController::class, 'edit'])->name('deserciones-edit');
                Route::patch('/{desercion}/update', [DesercionController::class, 'update'])->name('deserciones-update');
                Route::get('/{desercion}/anull', [DesercionController::class, 'anull'])->name('deserciones-anull');
            });

												Route::group(['prefix' => '/calificaciones', 'middleware' => ['docente']], function(){

                Route::get('/', [CalificacionController::class, 'index'])->name('calificaciones-index');
                Route::get('/create', [CalificacionController::class, 'create'])->name('calificaciones-create');
                Route::post('/store', [CalificacionController::class, 'store'])->name('calificaciones-store');
                Route::get('/{calificacion}', [CalificacionController::class, 'show'])->name('calificaciones-show');

																Route::get('/get/planes-evaluaciones', [CalificacionController::class, 'getPlanesEvaluaciones']);
																Route::get('/get/calificaciones', [CalificacionController::class, 'getcalificaciones']);
            });
        });
    });

				Route::group(['prefix' => '/informes', 'middleware' => ['secretario']], function(){

        Route::get('/', [InformeController::class, 'index'])->name('informes-index');

        Route::prefix('/referenciales')->group(function () {

            Route::get('/areas', [InformeReferencialController::class, 'areas'])->name('informes-referenciales-areas');
            Route::get('/asignaturas', [InformeReferencialController::class, 'asignaturas'])->name('informes-referenciales-asignaturas');
            Route::get('/bachilleratos', [InformeReferencialController::class, 'bachilleratos'])->name('informes-referenciales-bachilleratos');
            Route::get('/grados', [InformeReferencialController::class, 'grados'])->name('informes-referenciales-grados');
            Route::get('/requisitos', [InformeReferencialController::class, 'requisitos'])->name('informes-referenciales-requisitos');
            Route::get('/tipos-evaluaciones', [InformeReferencialController::class, 'tiposEvaluaciones'])->name('informes-referenciales-tipos-evaluaciones');

            Route::get('/ciudades', [InformeReferencialController::class, 'ciudades'])->name('informes-referenciales-ciudades');
            Route::get('/clausulas', [InformeReferencialController::class, 'clausulas'])->name('informes-referenciales-clausulas');
            Route::get('/causas', [InformeReferencialController::class, 'causas'])->name('informes-referenciales-causas');

            Route::get('/nacionalidades', [InformeReferencialController::class, 'nacionalidades'])->name('informes-referenciales-nacionalidades');
            Route::get('/estudiantes', [InformeReferencialController::class, 'estudiantes'])->name('informes-referenciales-estudiantes');
            Route::get('/guardianes', [InformeReferencialController::class, 'guardianes'])->name('informes-referenciales-guardianes');

            Route::get('/sedes', [InformeReferencialController::class, 'sedes'])->name('informes-referenciales-sedes');
            Route::get('/usuarios', [InformeReferencialController::class, 'usuarios'])->name('informes-referenciales-usuarios');

            Route::get('/print', [InformeReferencialController::class, 'print'])->name('informes-referenciales-print');
        });

        Route::prefix('/movimientos')->group(function () {

            Route::get('/mallas-curriculares', [InformeMovimientoAcademicoController::class, 'mallaCurricular'])->name('informes-movimientos-mallas-curriculares');
            Route::get('/planes-cursos', [InformeMovimientoAcademicoController::class, 'planCurso'])->name('informes-movimientos-planes-cursos');
            Route::get('/planes-academicos', [InformeMovimientoAcademicoController::class, 'planAcademico'])->name('informes-movimientos-planes-academicos');
            Route::get('/planes-academicos/get/planes-academicos', [InformeMovimientoAcademicoController::class, 'getPlanesAcademicos']);
            Route::get('/planes-academicos/print', [InformeMovimientoAcademicoController::class, 'getPlanesAcademicosPrint']);
            Route::get('/horarios', [InformeMovimientoAcademicoController::class, 'horario'])->name('informes-movimientos-horarios');
            Route::get('/requisitos-inscripcion', [InformeMovimientoAcademicoController::class, 'requisitoInscripcion'])->name('informes-movimientos-requisitos-inscripcion');
            Route::get('/planes-evaluaciones', [InformeMovimientoAcademicoController::class, 'planEvaluacion'])->name('informes-movimientos-planes-evaluaciones');

            Route::get('/postulantes', [InformeMovimientoOperativoController::class, 'postulante'])->name('informes-movimientos-postulantes');
            Route::get('/contratos', [InformeMovimientoOperativoController::class, 'contrato'])->name('informes-movimientos-contratos');
            Route::get('/justificativos-operativo', [InformeMovimientoOperativoController::class, 'justificativoOperativo'])->name('informes-movimientos-justificativos-operativo');
            Route::get('/permisos', [InformeMovimientoOperativoController::class, 'permiso'])->name('informes-movimientos-permisos');
            Route::get('/reemplazantes', [InformeMovimientoOperativoController::class, 'reemplazante'])->name('informes-movimientos-reemplazantes');
            Route::get('/asistencias-operativo', [InformeMovimientoOperativoController::class, 'asistenciaOperativo'])->name('informes-movimientos-asistencias-operativo');

            Route::get('/inscripciones', [InformeMovimientoDocumentalController::class, 'inscripcion'])->name('informes-movimientos-inscripciones');
            Route::get('/formularios-03', [InformeMovimientoDocumentalController::class, 'formulario03'])->name('informes-movimientos-formularios-03');
            Route::get('/justificativos-documental', [InformeMovimientoDocumentalController::class, 'justificativoDocumental'])->name('informes-movimientos-justificativos-documental');
            Route::get('/sanciones', [InformeMovimientoDocumentalController::class, 'sancion'])->name('informes-movimientos-sanciones');
            Route::get('/deserciones', [InformeMovimientoDocumentalController::class, 'desercion'])->name('informes-movimientos-deserciones');
												Route::get('/asistencias-documental', [InformeMovimientoDocumentalController::class, 'asistenciaDocumental'])->name('informes-movimientos-asistencias-documental');
												Route::get('/get/planes-academicos', [InformeMovimientoDocumentalController::class, 'getPlanesAcademicos']);
												Route::get('/get/inscripciones', [InformeMovimientoDocumentalController::class, 'getInscripciones']);
												Route::get('/calificaciones', [InformeMovimientoDocumentalController::class, 'calificacion'])->name('informes-movimientos-calificaciones');
												Route::get('/calificaciones/get/planes-evaluaciones', [InformeMovimientoDocumentalController::class, 'getPlanesEvaluaciones']);

												Route::get('/libreta-calificaciones', [InformeMovimientoDocumentalController::class, 'libretaCalificacion'])->name('informes-movimientos-libreta-calificaciones');

												Route::get('/academicos/print', [InformeMovimientoAcademicoController::class, 'print'])->name('informes-movimientos-academicos-print');
            Route::get('/operativos/print', [InformeMovimientoOperativoController::class, 'print'])->name('informes-movimientos-operativos-print');
            Route::get('/documentales/print', [InformeMovimientoDocumentalController::class, 'print'])->name('informes-movimientos-documentales-print');
        });
    });

				Route::prefix('/ayuda')->group(function () {

								Route::get('/', [AyudaController::class, 'index'])->name('ayuda-index');

				});

});
