<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Asignatura;
use App\Models\CalendarioAcademico;
use App\Models\Grado;
use App\Models\Inscripcion;
use App\Models\InscripcionPlanEvaluacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MallaCurricular;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use App\Models\PlanEvaluacion;
use App\Models\Sede;
use App\Models\TipoEvaluacion;

class PlanEvaluacionController extends Controller	{

				public function index()
				{
								$planes_cursos = PlanCurso::where('estado', 'Activo')->get();

								return view('procesos.academicos.planes-evaluaciones.index', compact('planes_cursos'));
				}

				public function getPlanesEvaluaciones(Request $request)
				{
								$query = PlanEvaluacion::query();

								$query->with('tipo_evaluacion', 'plan_academico.asignatura');

								$query->when($request->plan_curso_id, function ($q) use ($request) {
												return $q->where('plan_curso_id', $request->plan_curso_id);
								});

								$query->when($request->plan_academico_id, function ($q) use ($request) {
												return $q->where('plan_academico_id', $request->plan_academico_id);
								});

								$query->when($request->tipo_evaluacion_id, function ($q) use ($request) {
												return $q->where('tipo_evaluacion_id', $request->tipo_evaluacion_id);
								});

								return $query->get();
				}

				public function getPlanesAcademicos(Request $request)
				{
								return PlanAcademico::with('asignatura')->where('plan_curso_id', $request->id)->get();
				}

				public function getInscripciones(Request $request)
				{
								return Inscripcion::with('estudiante')->where('plan_curso_id', $request->id)->get();
				}

				public function create()
				{
								$planes_cursos = PlanCurso::with('inscripcion.estudiante')->where('estado', 'Activo')->get();
								$tipos_evaluaciones = TipoEvaluacion::all();

								return view('procesos.academicos.planes-evaluaciones.create', compact('planes_cursos', 'tipos_evaluaciones'));
				}

				public function store(Request $request, PlanEvaluacion $plan_evaluacion)
				{
								$validator = $request->validate([
												'plan_curso_id'      => [
																'required',
												],
												'plan_academico_id'  => [
																'required',
												],
												'tipo_evaluacion_id' => [
																'required',
												],
												'tema'               => [
																'required',
												],
												'ponderacion'        => [
																'required',
																'integer',
																'min:0',
																'max:100',
												],
												'fecha'              => [
																'required',
												],
												'inscripcion_id'     => [
																'required',
												],
								]);

								$today = '';
								switch (Carbon::parse($request->fecha)->format('l')) {
												case ('Monday'):
																$today = 'Lunes';
																break;

												case ('Tuesday'):
																$today = 'Martes';
																break;

												case ('Wednesday'):
																$today = 'Miercoles';
																break;

												case ('Thursday'):
																$today = 'Jueves';
																break;

												case ('Friday'):
																$today = 'Viernes';
																break;

												case ('Saturday'):
																$today = 'Sabado';
																break;

												case ('Sunday'):
																$today = 'Domingo';
																break;
								}

								if (CalendarioAcademico::where('fecha', $request->fecha)->first() || $today == 'Sabado' || $today == 'Domingo') {
												return back()->withInput()->with('invaliddate', 'invaliddate');
								}

								$plan_evaluacion->plan_curso_id = $request->plan_curso_id;
								$plan_evaluacion->plan_academico_id = $request->plan_academico_id;
								$plan_evaluacion->tipo_evaluacion_id = $request->tipo_evaluacion_id;
								$plan_evaluacion->tema = $request->tema;
								$plan_evaluacion->ponderacion = $request->ponderacion;
								$plan_evaluacion->fecha = $request->fecha;

								$plan_evaluacion->save();

								foreach ($request->inscripcion_id as $inscripcion_id) {
												$inscripcion_plan_evaluacion = new InscripcionPlanEvaluacion;

												$inscripcion_plan_evaluacion->inscripcion_id = $inscripcion_id;
												$inscripcion_plan_evaluacion->plan_evaluacion_id = $plan_evaluacion->id;

												$inscripcion_plan_evaluacion->save();
								}

								AppHelper::instance()->logUserActivity('planes_evaluaciones', 'creacion');

								return redirect('procesos/academicos/planes-evaluaciones')->with('success', 'success');
				}

				public function show(PlanEvaluacion $plan_evaluacion)
				{
								$inscripciones = Inscripcion::where('plan_curso_id', $plan_evaluacion->plan_curso_id)->get();

								return view('procesos.academicos.planes-evaluaciones.show', compact('plan_evaluacion', 'inscripciones'));
				}

				public function edit(PlanEvaluacion $plan_evaluacion)
				{
								$tipos_evaluaciones = TipoEvaluacion::all();

								$inscripciones = Inscripcion::where('plan_curso_id', $plan_evaluacion->plan_curso_id)->get();
								$inscriptos = array_column($plan_evaluacion->inscripciones_planes_evaluaciones->toArray(), 'inscripcion_id');

								foreach ($inscripciones as $inscripcion) {
												if (in_array($inscripcion->id, $inscriptos)) {
																$inscripcion['checked'] = 'true';
												}
								}

								return view('procesos.academicos.planes-evaluaciones.edit', compact('plan_evaluacion', 'tipos_evaluaciones', 'inscripciones'));
				}

				public function update(Request $request, PlanEvaluacion $plan_evaluacion)
				{
								$validator = $request->validate([
												'tipo_evaluacion_id' => [
																'required',
												],
												'tema'               => [
																'required',
												],
												'ponderacion'        => [
																'required',
																'integer',
																'min:0',
																'max:100',
												],
												'fecha'              => [
																'required',
												],
								]);


								$plan_evaluacion->tipo_evaluacion_id = $request->tipo_evaluacion_id;
								$plan_evaluacion->tema = $request->tema;
								$plan_evaluacion->ponderacion = $request->ponderacion;
								$plan_evaluacion->fecha = $request->fecha;

								$plan_evaluacion->save();

								InscripcionPlanEvaluacion::where('plan_evaluacion_id', $plan_evaluacion->id)->delete();

								if ($request->inscripcion_id) {
												foreach ($request->inscripcion_id as $inscripcion_id) {
																$inscripcion_plan_evaluacion = new InscripcionPlanEvaluacion;

																$inscripcion_plan_evaluacion->inscripcion_id = $inscripcion_id;
																$inscripcion_plan_evaluacion->plan_evaluacion_id = $plan_evaluacion->id;

																$inscripcion_plan_evaluacion->save();
												}
								}

								AppHelper::instance()->logUserActivity('planes_evaluaciones', 'actualizacion');

								return redirect('procesos/academicos/planes-evaluaciones')->with('success', 'success');
				}

				public function anull(PlanEvaluacion $plan_evaluacion)
				{
								try {
												$someDate = new \DateTime($plan_evaluacion->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/academicos/planes-evaluaciones')->with('nopuedeanular', 'success');
												}

												$plan_evaluacion->estado = 'Anulado';

												$plan_evaluacion->save();

												AppHelper::instance()->logUserActivity('planes_evaluaciones', 'anulacion');

												return redirect('procesos/academicos/planes-evaluaciones')->with('success', 'success');
								} catch (\Illuminate\Database\QueryException $e) {

												return redirect('procesos/academicos/planes-evaluaciones')->with('error', 'error');
								}
				}

}
