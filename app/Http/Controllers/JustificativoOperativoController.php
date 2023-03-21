<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaOperativo;
use App\Models\Causa;
use App\Models\Contrato;
use App\Models\JustificativoOperativo;
use Illuminate\Http\Request;

class JustificativoOperativoController extends Controller
{
    public function index()
    {
        $data['contratos'] = Contrato::with('asignatura')
            ->where([
                ['estado', 'Activo'],
            ])
            ->get();

        return view('procesos.operativos.justificativos.index', $data);
    }

    public function getJustificativos(Request $request)
    {
        return JustificativoOperativo::with('causa', 'asistencia_operativo')
            ->where('contrato_id', $request->id)
            ->get();
    }

    public function create()
    {
        $data['contratos'] = Contrato::with('asignatura')
            ->where([
                ['estado', 'Activo'],
            ])
            ->get();

        $data['causas'] = Causa::where('tipo', 'Justificativo')->get();

        return view('procesos.operativos.justificativos.create', $data);
    }

    public function getAusencias(Request $request)
    {
        return AsistenciaOperativo::with('contrato', 'horario_detalle')->where([
            ['contrato_id', $request->id],
            ['estado', 'Ausente']
        ])->get();
    }

    public function show(JustificativoOperativo $justificativo_operativo)
    {
        return view('procesos.operativos.justificativos.show', compact('justificativo_operativo'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'contrato_id' => [
                'required',
            ],
            'asistencia_id' => [
                'required',
            ],
            'causa_id' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);

        $justificativo_operativo = new JustificativoOperativo;

        $justificativo_operativo->contrato_id = $request->contrato_id;
        $justificativo_operativo->asistencia_operativo_id = $request->asistencia_id;
        $justificativo_operativo->causa_id = $request->causa_id;
        $justificativo_operativo->observacion = $request->observacion;

        $justificativo_operativo->save();

        AppHelper::instance()->logUserActivity('justificativos_operativo', 'creacion');

        $asistencia_operativo = AsistenciaOperativo::find($request->asistencia_id);

        $asistencia_operativo->estado = 'Presente';

        $asistencia_operativo->save();

        AppHelper::instance()->logUserActivity('asistencias_operativo', 'actualizacion');

        return redirect('procesos/operativos/justificativos')->with('success', 'success');
    }

    public function anull(JustificativoOperativo $justificativo_operativo)
    {
								$someDate = new \DateTime($justificativo_operativo->created_at);
								$now = new \DateTime();

								if($someDate->diff($now)->days > 30) {
												return redirect('procesos/operativos/justificativos')->with('nopuedeanular', 'success');
								}

        $justificativo_operativo->estado = 'Anulado';

        $justificativo_operativo->save();

        AppHelper::instance()->logUserActivity('justificativos_operativo', 'actualizacion');

        $asistencia_operativo = AsistenciaOperativo::find($justificativo_operativo->asistencia_operativo_id);

        $asistencia_operativo->estado = 'Ausente';

        $asistencia_operativo->save();

        AppHelper::instance()->logUserActivity('asistencias_operativo', 'actualizacion');

        return redirect('procesos/operativos/justificativos')->with('success', 'success');
    }
}
