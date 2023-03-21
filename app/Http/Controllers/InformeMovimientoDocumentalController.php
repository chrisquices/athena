<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\AsistenciaDocumental;
use App\Models\AsistenciaOperativo;
use App\Models\Bachillerato;
use App\Models\Calificacion;
use App\Models\Causa;
use App\Models\Ciudad;
use App\Models\Clausula;
use App\Models\Contrato;
use App\Models\Desercion;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Guardian;
use App\Models\Horario;
use App\Models\HorarioDetalle;
use App\Models\Inscripcion;
use App\Models\InscripcionPlanEvaluacion;
use App\Models\JustificativoDocumental;
use App\Models\JustificativoOperativo;
use App\Models\MallaCurricular;
use App\Models\Nacionalidad;
use App\Models\Permiso;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use App\Models\PlanEvaluacion;
use App\Models\Postulante;
use App\Models\Reemplazante;
use App\Models\Requisito;
use App\Models\RequisitoInscripcion;
use App\Models\Sancion;
use App\Models\Sede;
use App\Models\TipoEvaluacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeMovimientoDocumentalController extends Controller {

				public function inscripcion()
				{
								$data['tabla_nombre'] = 'Inscripciones';
								$data['estudiantes'] = Estudiante::all();
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.inscripciones.index', $data);
				}

				public function formulario03()
				{
								$data['tabla_nombre'] = 'Formularios 03';
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.formularios03.index', $data);
				}

				public function justificativoDocumental()
				{
								$data['tabla_nombre'] = 'Justificativos Documentales';
								$data['inscripciones'] = Inscripcion::all();
								$data['causas'] = Causa::where('tipo', 'Justificativo')->get();

								return view('informes.movimientos.documentales.justificativos.index', $data);
				}

				public function sancion()
				{
								$data['tabla_nombre'] = 'Sanciones';
								$data['inscripciones'] = Inscripcion::all();
								$data['causas'] = Causa::where('tipo', 'Sanción')->get();

								return view('informes.movimientos.documentales.sanciones.index', $data);
				}

				public function desercion()
				{
								$data['tabla_nombre'] = 'Deserciones';
								$data['inscripciones'] = Inscripcion::all();
								$data['causas'] = Causa::where('tipo', 'Deserción')->get();

								return view('informes.movimientos.documentales.deserciones.index', $data);
				}

				public function asistenciaDocumental()
				{
								$data['tabla_nombre'] = 'Asistencias';
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.asistencias.index', $data);
				}

				public function getPlanesAcademicos(Request $request)
				{
								return PlanAcademico::where('plan_curso_id', $request->id)->get();
				}

				public function getInscripciones(Request $request)
				{
								return Inscripcion::with('estudiante')->where('plan_curso_id', $request->id)->get();
				}

				public function calificacion()
				{
								$data['tabla_nombre'] = 'Calificacion';
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.calificaciones.index', $data);
				}

				public function getPlanesEvaluaciones(Request $request)
				{
								return PlanEvaluacion::where('plan_academico_id', $request->plan_academico_id)->get();
				}

				public function libretaCalificacion()
				{
								$data['tabla_nombre'] = 'Calificacion';
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.libreta-calificaciones.index', $data);
				}

				public function print(Request $request)
				{
								$data['tabla'] = $request->tabla;
								$data['columnas'] = $request->columnas;
								$data['orientation'] = $request->orientation;
								$data['size'] = $request->size;

								switch ($data['tabla']) {
												case 'inscripciones':

																$query = Inscripcion::query();

																if ($request->estudiante_id)
																				$query = $query->where('estudiante_id', $request->estudiante_id);

																if ($request->plan_curso_id)
																				$query = $query->where('plan_curso_id', $request->plan_curso_id);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.documentales.inscripciones.print', $data);

																break;

												case 'formularios03':

																$data['plan_curso'] = PlanCurso::find($request->plan_curso_id);

																$data['inscripciones'] = Inscripcion::where([
																				['estado', 'Activo'],
																				['plan_curso_id', $request->plan_curso_id],
																])->get();

																return view('informes.movimientos.documentales.formularios03.print', $data);

																break;

												case 'justificativos':

																$query = JustificativoDocumental::query();

																if ($request->inscripcion_id)
																				$query = $query->where('inscripcion_id', $request->inscripcion_id);

																if ($request->causa_id)
																				$query = $query->where('causa_id', $request->causa_id);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.documentales.justificativos.print', $data);

																break;

												case 'sanciones':

																$query = Sancion::query();

																if ($request->inscripcion_id)
																				$query = $query->where('inscripcion_id', $request->inscripcion_id);

																if ($request->causa_id)
																				$query = $query->where('causa_id', $request->causa_id);

																if ($request->tipo)
																				$query = $query->where('tipo', $request->tipo);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.documentales.sanciones.print', $data);

																break;

												case 'deserciones':

																$query = Desercion::query();

																if ($request->inscripcion_id)
																				$query = $query->where('inscripcion_id', $request->inscripcion_id);

																if ($request->causa_id)
																				$query = $query->where('causa_id', $request->causa_id);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('fecha', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('fecha', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('fecha', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.documentales.deserciones.print', $data);

																break;

												case 'asistencias':

																$query = AsistenciaDocumental::query();

																if ($request->inscripcion_id)
																				$query = $query->where('inscripcion_id', $request->inscripcion_id);

																if ($request->plan_academico_id)
																				$query = $query->where('plan_academico_id', $request->plan_academico_id);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha)
																				$query = $query->where('fecha', '>=', $request->fecha);

																$data['registros'] = $query->get();

																if (count($data['registros']) != 0) {
																				$data['plan_curso'] = $data['registros'][0]->plan_academico->plan_curso;
																				$data['asignatura'] = $data['registros'][0]->plan_academico->asignatura->nombre;

																				return view('informes.movimientos.documentales.asistencias.print', $data);
																}

																return back()->with('norecords', 'records');

																break;

												case 'calificaciones':
																$plan_curso = $request->plan_curso_id;
																$plan_academico = $request->plan_academico_id;
																$plan_evaluacion = $request->plan_evaluacion_id;
																$inscripcion = $request->inscripcion_id;

																if ($plan_curso && $plan_academico && empty($plan_evaluacion) && empty($inscripcion)) {
																				$data['registros'] = PlanEvaluacion::with(
																								'plan_curso.sede',
																								'plan_curso.malla_curricular.bachillerato',
																								'tipo_evaluacion',
																								'plan_academico',
																								'inscripciones_planes_evaluaciones.inscripcion.estudiante')
																								->where('plan_curso_id', $request->plan_curso_id)
																								->get();

																				return view('informes.movimientos.documentales.calificaciones.print', $data);

																}

																if ($plan_curso && $plan_academico && $plan_evaluacion && empty($inscripcion)) {
																				$data['registro'] = PlanEvaluacion::with(
																								'plan_curso.sede',
																								'plan_curso.malla_curricular.bachillerato',
																								'tipo_evaluacion',
																								'plan_academico',
																								'inscripciones_planes_evaluaciones.inscripcion.estudiante')
																								->where('id', $plan_evaluacion)
																								->first();

																				return view('informes.movimientos.documentales.calificaciones.print-2', $data);
																}

																break;

												case 'libretas':

																$data['plan_curso'] = PlanCurso::find($request->plan_curso_id);
																$data['inscripcion'] = Inscripcion::find($request->inscripcion_id);
																$data['tabla'] = 'Resumen de Calificaciones';

																$planes_academicos = PlanAcademico::with('asignatura')
																				->where('plan_curso_id', $request->plan_curso_id)
																				->get();

																foreach ($planes_academicos as $plan_academico) {

																				// Nota 1
																				$evaluaciones_etapa_1 = PlanEvaluacion::where([
																								['plan_academico_id', $plan_academico->id],
																								['etapa', '1'],
																				])->get();

																				$plan_academico['puntaje_total_etapa_1'] = array_sum($evaluaciones_etapa_1->pluck('ponderacion')->toArray());

																				foreach ($evaluaciones_etapa_1 as $evaluacion_etapa_1) {
																								$calificaciones = InscripcionPlanEvaluacion::where('inscripcion_id', $request->inscripcion_id)
																												->whereIn('plan_evaluacion_id', $evaluaciones_etapa_1->pluck('id')->toArray())
																												->get();

																								$plan_academico['puntaje_logrado_etapa_1'] = array_sum($calificaciones->pluck('puntaje_logrado')->toArray());

																				}
																				$plan_academico['nota_1'] = $this->calculadoraPorEscala(
																								$request,
																								$plan_academico['puntaje_total_etapa_1'],
																								$plan_academico['puntaje_logrado_etapa_1']
																				);

																				// Nota 2
																				$evaluaciones_etapa_2 = PlanEvaluacion::where([
																								['plan_academico_id', $plan_academico->id],
																								['etapa', '2'],
																				])->get();

																				$plan_academico['puntaje_total_etapa_2'] = array_sum($evaluaciones_etapa_2->pluck('ponderacion')->toArray());

																				foreach ($evaluaciones_etapa_2 as $evaluacion_etapa_2) {
																								$calificaciones = InscripcionPlanEvaluacion::where('inscripcion_id', $request->inscripcion_id)
																												->whereIn('plan_evaluacion_id', $evaluaciones_etapa_2->pluck('id')->toArray())
																												->get();

																								$plan_academico['puntaje_logrado_etapa_2'] = array_sum($calificaciones->pluck('puntaje_logrado')->toArray());

																				}

																				$plan_academico['nota_2'] = $this->calculadoraPorEscala(
																								$request,
																								$plan_academico['puntaje_total_etapa_2'],
																								$plan_academico['puntaje_logrado_etapa_2']
																				);

																				$plan_academico['nota_3'] = ($plan_academico['nota_1'] + $plan_academico['nota_2']) / 2;

																}

																foreach ($planes_academicos as $plan_academico) {
																				$plan_academico['reprobado'] = false;

																				if (($plan_academico->nota_1 + $plan_academico->nota_2)  <= 3) {
																								$plan_academico['reprobado'] = true;
																				}

																				if ($plan_academico->nota_2  <= 2) {
																								$plan_academico['reprobado'] = true;
																				}
																}

																foreach	($planes_academicos as $plan_academico) {
																				if ($plan_academico['reprobado'])
																								$plan_academico['reprobado_general'] = true;

																				if (!$plan_academico['reprobado'])
																								$plan_academico['reprobado_general'] = false;
																}

																$data['planes_academicos'] = $planes_academicos;
																return view('informes.movimientos.documentales.libreta-calificaciones.print', $data);

																break;

												default:
																break;
								}
				}

				public function calculadoraPorEscala($escala, $total, $logrado) {

								if ($total == 0) $p = 0;
								if ($total !== 0) $p = ($logrado * 100) / $total;

								$n1d = $escala->nota1_desde;
								$n1h = $escala->nota1_hasta;
								$n2d = $escala->nota2_desde;
								$n2h = $escala->nota2_hasta;
								$n3d = $escala->nota3_desde;
								$n3h = $escala->nota3_hasta;
								$n4d = $escala->nota4_desde;
								$n4h = $escala->nota4_hasta;
								$n5d = $escala->nota5_desde;
								$n5h = $escala->nota5_hasta;

								if ($p >= $n1d && $p <= $n1h) return 1;
								if ($p >= $n2d && $p <= $n2h) return 2;
								if ($p >= $n3d && $p <= $n3h) return 3;
								if ($p >= $n4d && $p <= $n4h) return 4;
								if ($p >= $n5d && $p <= $n5h) return 5;
				}

}
