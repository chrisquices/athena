<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaDocumental;
use App\Models\AsistenciaOperativo;
use App\Models\Causa;
use App\Models\Contrato;
use App\Models\Inscripcion;
use App\Models\JustificativoDocumental;
use App\Models\JustificativoOperativo;
use Illuminate\Http\Request;

class JustificativoDocumentalController extends Controller
{
    public function index()
    {
        $data['inscripciones'] = Inscripcion::with('estudiante')
            ->where('estado', 'Activo')
            ->get();

        return view('procesos.documentales.justificativos.index', $data);
    }

    public function getJustificativos(Request $request)
    {
        return JustificativoDocumental::with('causa', 'asistencia_documental', 'inscripcion.estudiante')
            ->where('inscripcion_id', $request->id)
            ->get();
    }

    public function create()
    {
        $data['inscripciones'] = Inscripcion::with('estudiante')
            ->where('estado', 'Activo')
            ->get();

        $data['causas'] = Causa::where('tipo', 'Justificativo')->get();


        return view('procesos.documentales.justificativos.create', $data);
    }

    public function getAusencias(Request $request)
    {
        return AsistenciaDocumental::with('plan_academico.asignatura')
            ->where([
                ['inscripcion_id', $request->id],
                ['estado', 'Ausente']
            ])->get();
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'inscripcion_id' => [
                'required',
            ],
            'asistencia_documental_id' => [
                'required',
            ],
            'causa_id' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);

        $justificativo_documental = new JustificativoDocumental;

        $justificativo_documental->inscripcion_id = $request->inscripcion_id;
        $justificativo_documental->asistencia_documental_id = $request->asistencia_documental_id;
        $justificativo_documental->causa_id = $request->causa_id;
        $justificativo_documental->observacion = $request->observacion;

        $justificativo_documental->save();

        AppHelper::instance()->logUserActivity('justificativos_documental', 'creacion');

        $asistencia_documental = AsistenciaDocumental::find($request->asistencia_documental_id);

        $asistencia_documental->estado = 'Presente';

        $asistencia_documental->save();

        AppHelper::instance()->logUserActivity('asistencias_documental', 'actualizacion');

        return redirect('procesos/documentales/justificativos')->with('success', 'success');
    }

    public function show(JustificativoDocumental $justificativo_documental)
    {
        return view('procesos.documentales.justificativos.show', compact('justificativo_documental'));
    }

    public function edit(JustificativoDocumental $justificativo_documental)
    {
        $causas = Causa::where('tipo', 'Justificativo')->get();

        return view('procesos.documentales.justificativos.edit', compact('justificativo_documental', 'causas'));
    }

    public function update(Request $request, JustificativoDocumental $justificativo_documental)
    {
        $validator = $request->validate([
            'causa_id' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);


        $justificativo_documental->causa_id = $request->causa_id;
        $justificativo_documental->observacion = $request->observacion;

        $justificativo_documental->save();

        AppHelper::instance()->logUserActivity('justificativos_documental', 'actualizacion');

        return redirect('procesos/documentales/justificativos')->with('success', 'success');
    }


    public function anull(JustificativoDocumental $justificativo_documental)
    {
								$someDate = new \DateTime($justificativo_documental->created_at);
								$now = new \DateTime();

								if($someDate->diff($now)->days > 30) {
												return redirect('procesos/documentales/justificativos')->with('nopuedeanular', 'success');
								}

        $justificativo_documental->estado = 'Anulado';

        $justificativo_documental->save();

        AppHelper::instance()->logUserActivity('justificativos_documental', 'actualizacion');

        $asistencia_documental = AsistenciaDocumental::find($justificativo_documental->asistencia_documental_id);

        $asistencia_documental->estado = 'Ausente';

        $asistencia_documental->save();

        AppHelper::instance()->logUserActivity('asistencias_documental', 'actualizacion');

        return redirect('procesos/documentales/justificativos')->with('success', 'success');
    }
}
