<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaDocumental;
use App\Models\AsistenciaOperativo;
use App\Models\CalendarioAcademico;
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

class AsistenciaDocumentalController extends Controller
{
    public function index()
    {
        $data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.documentales.asistencias.index', $data);
    }

    public function getAsignaturas(Request $request)
    {
        return PlanAcademico::with('asignatura')->where('plan_curso_id', $request->id)->get();
    }

				public function checkCalendarioAcademico(Request $request) {
								if (CalendarioAcademico::where('fecha', $request->fecha)->first()) {
												return 'unavailable';
								} else {
												return 'available';
								}
				}

    public function getInscripciones(Request $request)
    {
        $asistencias = AsistenciaDocumental::with('inscripcion.estudiante')
            ->where([
                ['plan_academico_id', $request->plan_academico_id],
                ['fecha', $request->fecha]
            ])->get();

        if (count($asistencias) == 0) {
            return Inscripcion::with('estudiante')->where('plan_curso_id', $request->plan_curso_id)->get();
        }

        return $asistencias;
    }

    public function store(Request $request)
    {
        $estados = array_values($request->estado);

        if ($request->action == 'store') {
            foreach ($request->inscripcion_id as $key => $inscripcion) {
                $asistencia_documental = new AsistenciaDocumental;

																$asistencia_documental->plan_academico_id = $request->plan_academico_id;
                $asistencia_documental->inscripcion_id = $request->inscripcion_id[$key];
                $asistencia_documental->fecha = $request->fecha;
                $asistencia_documental->estado = $estados[$key];

                $asistencia_documental->save();

                AppHelper::instance()->logUserActivity('asistencias_operativo', 'creacion');
            }
        }

        if ($request->action == 'update') {

            foreach ($request->inscripcion_id as $key => $inscripcion) {

                $asistencia_documental = AsistenciaDocumental::find($request->asistencia_id[$key]);

                $asistencia_documental->estado = $estados[$key];

                $asistencia_documental->save();

                AppHelper::instance()->logUserActivity('asistencias_operativo', 'actualizacion');
            }
        }

        return redirect('procesos/documentales/asistencias')->with('success', 'success');
    }
}
