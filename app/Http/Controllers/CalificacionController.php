<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaDocumental;
use App\Models\AsistenciaOperativo;
use App\Models\Calificacion;
use App\Models\ContratoUser;
use App\Models\HorarioDetalle;
use App\Models\Inscripcion;
use App\Models\InscripcionPlanEvaluacion;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use App\Models\PlanEvaluacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CalificacionController extends Controller	{

				public function index()
				{
								$data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

								return view('procesos.documentales.calificaciones.index', $data);
				}

				public function getAsignaturas(Request $request)
				{
								return PlanAcademico::with('asignatura')->where('plan_curso_id', $request->id)->get();
				}

				public function getPlanesEvaluaciones(Request $request)
				{
								return PlanEvaluacion::with('tipo_evaluacion')->where('plan_academico_id', $request->id)->get();
				}

				public function getCalificaciones(Request $request)
				{
								return InscripcionPlanEvaluacion::with('inscripcion.estudiante', 'plan_evaluacion')->where('plan_evaluacion_id', $request->plan_evaluacion_id)->get();
				}

				public function store(Request $request)
				{
								$plan_evaluacion_id = InscripcionPlanEvaluacion::find($request->calificacion_id)->plan_evaluacion_id;
								$plan_evaluacion = PlanEvaluacion::find($plan_evaluacion_id);

								foreach ($request->puntaje as $puntaje) {
												if ($puntaje > $plan_evaluacion->ponderacion) {
																return back()->with('overponderacion', 'overponderacion');
												}
								}

								foreach ($request->inscripcion_plan_evaluacion_id as $key => $inscripcion) {

												$calificacion = InscripcionPlanEvaluacion::find($request->inscripcion_plan_evaluacion_id[$key]);

												$calificacion->puntaje_logrado = $request->puntaje[$key];
												$calificacion->estado = 'Activo';
												$calificacion->observacion = $request->observacion[$key];

												$calificacion->save();

												AppHelper::instance()->logUserActivity('inscripciones_planes_evaluaciones', 'actualizacion');
								}

								if (!empty($request->anular)) {
												foreach ($request->anular as $anular) {
																$calificacion = InscripcionPlanEvaluacion::where('id', $request->anular)->first();
																$calificacion->puntaje_logrado = 0;
																$calificacion->estado = 'Anulado';
																$calificacion->save();
												}
								}

								return redirect('procesos/documentales/calificaciones')->with('success', 'success');
				}

}
