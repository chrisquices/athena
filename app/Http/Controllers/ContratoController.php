<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\AsignaturaPostulante;
use App\Models\Bachillerato;
use App\Models\Clausula;
use App\Models\Contrato;
use App\Models\Grado;
use App\Models\Postulante;
use Illuminate\Http\Request;
use App\Models\MallaCurricular;
use App\Models\PlanCurso;
use App\Models\Sede;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;

class ContratoController extends Controller
{
    public function index()
    {
        $data['contratos'] = Contrato::where('estado', 'Activo')->get();

        return view('procesos.operativos.contratos.index', $data);
    }

    public function create()
    {
        $data['clausulas'] = Clausula::all();
        $data['postulantes'] = Postulante::all();

        return view('procesos.operativos.contratos.create', $data);
    }

    public function getAsignaturas(Request $request) {
        $asignaturas_ids_ocupados = Contrato::where([
            ['estado', 'Activo'],
            ['postulante_id', $request->id]
        ])->pluck('asignatura_id')->toArray();


        $asignaturas_ids = AsignaturaPostulante::where('postulante_id', $request->id)
            ->whereNotIn('asignatura_id', $asignaturas_ids_ocupados)
            ->pluck('asignatura_id')->toArray();

        return Asignatura::find($asignaturas_ids);
    }

    public function store(Request $request, Contrato $contrato)
    {
        $validator = $request->validate([
            'postulante_id' => [
                'required',
            ],
            'asignatura_id' => [
                'required',
            ],
            'fecha_inicio' => [
                'required',
            ],
												'clausulas' => [
																'required',
												],
												'salario' => [
																'required',
												],
        ]);

        $asignatura_postulante = AsignaturaPostulante::where([
            ['postulante_id', $request->postulante_id],
            ['asignatura_id', $request->asignatura_id]
        ])->first();

        $contrato->asignatura_id = $request->asignatura_id;
        $contrato->postulante_id = $request->postulante_id;
								$contrato->fecha_inicio = $request->fecha_inicio;
								$contrato->salario = $request->salario;
        $contrato->clausulas = $request->clausulas;

        $contrato->save();

        AppHelper::instance()->logUserActivity('contratos', 'creacion');

        return redirect('procesos/operativos/contratos')->with('success', 'success');
    }

    public function print(Contrato $contrato)
    {
        $data['contrato'] = $contrato;

        AppHelper::instance()->logUserActivity('contratos', 'generacion');

        return view('procesos.operativos.contratos.print', $data);
    }

    public function anull(Contrato $contrato)
    {
        try {
												$someDate = new \DateTime($contrato->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/operativos/contratos')->with('nopuedeanular', 'success');
												}

												$contrato->estado = 'Anulado';

            $contrato->save();

            AppHelper::instance()->logUserActivity('contratos', 'anulacion');

            return redirect('procesos/operativos/contratos')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/operativos/contratos')->with('error', 'error');
        }
    }
}
