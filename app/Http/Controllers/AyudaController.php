<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaDocumental;
use App\Models\AsistenciaOperativo;
use App\Models\ContratoUser;
use App\Models\HorarioDetalle;
use App\Models\Inscripcion;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AyudaController extends Controller
{
    public function index()
    {
								$data['items'] = [
												'acceso',
												'areas',
												'asignaturas',
												'bachilleratos',
												'grados',
												'requisitos',
												'tipos-evaluaciones',
												'ciudades',
												'clausulas',
												'causas',
												'nacionalidades',
												'estudiantes',
												'guardianes',
												'mallas-curriculares',
												'planes-cursos',
												'planes-academicos',
												'horarios-clases',
												'requisitos-inscripcion',
												'planes-evaluaciones',
												'postulantes',
												'contratos',
												'justificativos-operativo',
												'permisos',
												'reemplazantes',
												'inscripciones',
												'formularios-03',
												'justificativos-documental',
												'sanciones',
												'deserciones'
								];

        return view('ayuda.index', $data);
    }
}
