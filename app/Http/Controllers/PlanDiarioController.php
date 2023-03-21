<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaOperativo;
use App\Models\Contrato;
use App\Models\ContratoUser;
use App\Models\HorarioDetalle;
use App\Models\PlanCurso;
use App\Models\PlanDiario;
use App\Models\PlanDiarioDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PlanDiarioController extends Controller {

				public function index()
				{
								$contratos_ids = ContratoUser::where([
												['estado', 'Activo'],
												['user_id', Auth::user()->id],
								])->pluck('contrato_id');

								$data['contratos'] = Contrato::find($contratos_ids);

								return view('procesos.operativos.planes-diarios.index', $data);
				}

				public function getPlanesDiarios(Request $request)
				{
								return PlanDiario::with('plan_curso.sede', 'plan_curso.grado', 'plan_curso.malla_curricular.bachillerato', 'contrato')->where('contrato_id', $request->id)->get();
				}

				public function subIndex(PlanDiario $plan_diario)
				{
								$data['planes_diarios_detalles'] = PlanDiarioDetalle::where('plan_diario_id', $plan_diario->id)->get();

								return view('procesos.operativos.planes-diarios.subindex', $data);
				}

				public function create()
				{
								$data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

								$contratos_ids = ContratoUser::where([
												['estado', 'Activo'],
												['user_id', Auth::user()->id],
								])->pluck('contrato_id');

								$data['contratos'] = Contrato::find($contratos_ids);

								return view('procesos.operativos.planes-diarios.create', $data);
				}

				public function subCreate(PlanDiario $plan_diario)
				{
								return view('procesos.operativos.planes-diarios.subcreate', compact('plan_diario'));
				}

				public function store(Request $request)
				{
								$validator = $request->validate([
												'contrato_id'   => [
																'required',
												],
												'plan_curso_id' => [
																'required',
												],
								]);

								$plan_diario = new PlanDiario();

								$plan_diario->contrato_id = $request->contrato_id;
								$plan_diario->plan_curso_id = $request->plan_curso_id;

								$plan_diario->save();

								return redirect('procesos/operativos/planes-diarios')->with('success', 'success');
				}

				public function subStore(PlanDiario $plan_diario, Request $request)
				{
								$validator = $request->validate([
												'fecha'                  => [
																'required',
												],
												'contenido_desarrollado' => [
																'required',
												],
								]);

								$plan_diario_detalle = new PlanDiarioDetalle();

								$plan_diario_detalle->plan_diario_id = $plan_diario->id;
								$plan_diario_detalle->fecha = $request->fecha;
								$plan_diario_detalle->contenido_desarrollado = $request->contenido_desarrollado;
								$plan_diario_detalle->observacion = $request->observacion;

								$plan_diario_detalle->save();

								return redirect('procesos/operativos/planes-diarios')->with('success', 'success');
				}

				public function show($plan_diario_detalle)
				{
								$data['plan_diario_detalle'] = PlanDiarioDetalle::find($plan_diario_detalle);

								return view('procesos.operativos.planes-diarios.show', $data);
				}

				public function print(PlanDiario $plan_diario)
				{
								$data['plan_diario'] = $plan_diario;

								return view('procesos.operativos.planes-diarios.print', $data);
				}

}
