<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\AsistenciaOperativo;
use App\Models\Bachillerato;
use App\Models\Causa;
use App\Models\Ciudad;
use App\Models\Clausula;
use App\Models\Contrato;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Guardian;
use App\Models\Horario;
use App\Models\HorarioDetalle;
use App\Models\Inscripcion;
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
use App\Models\Sede;
use App\Models\TipoEvaluacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeMovimientoOperativoController extends Controller {

				public function postulante()
				{
								$data['tabla_nombre'] = 'Postulantes';
								$data['ciudades'] = Ciudad::all();

								return view('informes.movimientos.operativos.postulantes.index', $data);
				}

				public function contrato()
				{
								$data['tabla_nombre'] = 'Contratos';
								$data['asignaturas'] = Asignatura::all();
								$data['postulantes'] = Postulante::all();

								return view('informes.movimientos.operativos.contratos.index', $data);
				}

				public function justificativoOperativo()
				{
								$data['tabla_nombre'] = 'Justificativos Operativos';
								$data['contratos'] = Contrato::all();
								$data['causas'] = Causa::all();

								return view('informes.movimientos.operativos.justificativos.index', $data);
				}

				public function permiso()
				{
								$data['tabla_nombre'] = 'Permisos';
								$data['contratos'] = Contrato::all();
								$data['causas'] = Causa::all();

								return view('informes.movimientos.operativos.permisos.index', $data);
				}

				public function reemplazante()
				{
								$data['tabla_nombre'] = 'Reemplazantes';

								return view('informes.movimientos.operativos.reemplazantes.index', $data);
				}

				public function asistenciaOperativo()
				{
								$data['tabla_nombre'] = 'Asistencias Operativos';
								$data['contratos'] = Contrato::all();
								$data['reemplazantes'] = Reemplazante::all();

								return view('informes.movimientos.operativos.asistencias.index', $data);
				}

				public function inscripcion()
				{
								$data['tabla_nombre'] = 'Inscripciones';
								$data['estudiantes'] = Estudiante::all();
								$data['planes_cursos'] = PlanCurso::all();

								return view('informes.movimientos.documentales.inscripciones.index', $data);
				}

				public function print(Request $request)
				{
								$data['tabla'] = $request->tabla;
								$data['columnas'] = $request->columnas;
								$data['orientation'] = $request->orientation;
								$data['size'] = $request->size;

								switch ($data['tabla']) {
												case 'postulantes':

																$query = Postulante::query();

																if ($request->ciudad_id)
																				$query = $query->where('ciudad_id', $request->ciudad_id);

																if ($request->documento_tipo)
																				$query = $query->where('documento_tipo', $request->documento_tipo);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.operativos.postulantes.print', $data);

																break;

												case 'contratos':

																$query = Contrato::query();

																if ($request->asignatura_id)
																				$query = $query->where('asignatura_id', $request->asignatura_id);

																if ($request->postulante_id)
																				$query = $query->where('postulante_id', $request->postulante_id);

																if ($request->estado)
																				$query = $query->where('estado', $request->estado);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																if ($request->salario_desde && empty($request->salario_hasta))
																				$query = $query->where('salario', '>=', $request->salario_desde);

																if ($request->salario_hasta && empty($request->salario_desde))
																				$query = $query->where('salario', '<=', $request->salario_hasta);

																if ($request->salario_hasta && $request->salario_desde)
																				$query = $query->whereBetween('salario', [$request->salario_desde, $request->salario_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.operativos.contratos.print', $data);

																break;

												case 'justificativos':

																$query = JustificativoOperativo::query();

																if ($request->contrato_id)
																				$query = $query->where('contrato_id', $request->contrato_id);

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

																return view('informes.movimientos.operativos.justificativos.print', $data);

																break;

												case 'permisos':

																$query = Permiso::query();

																if ($request->contrato_id)
																				$query = $query->where('contrato_id', $request->contrato_id);

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

																return view('informes.movimientos.operativos.permisos.print', $data);

																break;

												case 'reemplazantes':

																$query = Reemplazante::query();

																if ($request->contrato_id)
																				$query = $query->where('contrato_id', $request->contrato_id);

																if ($request->reemplazante_id)
																				$query = $query->where('reemplazante_id', $request->reemplazante_id);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('fecha', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('fecha', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('fecha', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.operativos.reemplazantes.print', $data);

																break;

												case 'asistencias':

																$query = AsistenciaOperativo::query();

																if ($request->contrato_id)
																				$query = $query->where('contrato_id', $request->contrato_id);

																if ($request->reemplazante_id)
																				$query = $query->where('reemplazante_id', $request->reemplazante_id);

																if ($request->fecha_desde && empty($request->fecha_hasta))
																				$query = $query->where('created_at', '>=', $request->fecha_desde);

																if ($request->fecha_hasta && empty($request->fecha_desde))
																				$query = $query->where('created_at', '<=', $request->fecha_hasta);

																if ($request->fecha_hasta && $request->fecha_desde)
																				$query = $query->whereBetween('created_at', [$request->fecha_desde, $request->fecha_hasta]);

																$data['registros'] = $query->get();

																return view('informes.movimientos.operativos.asistencias.print', $data);

																break;

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

																return view('informes.movimientos.operativos.asistencias.print', $data);

																break;

												default:
																break;
								}
				}

}
