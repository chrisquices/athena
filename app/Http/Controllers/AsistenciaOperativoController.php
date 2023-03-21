<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaOperativo;
use App\Models\ContratoUser;
use App\Models\HorarioDetalle;
use App\Models\Reemplazante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AsistenciaOperativoController extends Controller {

				public function index()
				{
								$data['contratos'] = ContratoUser::where([
												['estado', 'Activo'],
												['user_id', Auth::user()->id],
								])->get();

								$data['count'] = count($data['contratos']);

								$data['reemplazantes'] = Reemplazante::all();

								return view('procesos.operativos.asistencias.index', $data);
				}

				public function getHorarios(Request $request)
				{
								$today = Carbon::parse(Carbon::now())->format('l');

								switch ($today) {
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

								$horarios = HorarioDetalle::with(
												'horario.plan_curso.grado',
												'horario.plan_curso.sede',
												'horario.plan_curso.malla_curricular.bachillerato',
												'asignatura'
								)
												->where('contrato_id', $request->id)
												->whereHas('horario', function ($query) use ($today) {
																$query->where('dia', $today);
												})
												->whereNotIn('id', AsistenciaOperativo::where('contrato_id', 1)->pluck('horario_detalle_id')->toArray())
												->get()
												->toArray();

								return $horarios;
				}

				public function store(Request $request)
				{
								$asistencia_operativo = new AsistenciaOperativo;

								$asistencia_operativo->contrato_id = $request->hcontrato_id;
								$asistencia_operativo->horario_detalle_id = $request->hhorario_detalle_id;
								$asistencia_operativo->fecha = date('Y-m-d');
								$asistencia_operativo->estado = 'Presente';

								if ($request->hreemplazante_id) {
												$asistencia_operativo->reemplazante_id = $request->hreemplazante_id;
								}

								$asistencia_operativo->save();

								AppHelper::instance()->logUserActivity('asistencias_operativo', 'creacion');

								return redirect('procesos/operativos/asistencias')->with('success', 'success');
				}

}
