<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaDocumental;
use App\Models\Causa;
use App\Models\Inscripcion;
use App\Models\Sancion;
use Illuminate\Http\Request;

class SancionController extends Controller
{
    public function index()
    {
        $data['inscripciones'] = Inscripcion::with('estudiante')
            ->where('estado', 'Activo')
            ->get();

        return view('procesos.documentales.sanciones.index', $data);
    }

    public function getSanciones(Request $request)
    {
        return Sancion::with('causa', 'inscripcion.estudiante')
            ->where('inscripcion_id', $request->id)
            ->get();
    }

    public function create()
    {
        $data['inscripciones'] = Inscripcion::with('estudiante')
            ->where('estado', 'Activo')
            ->get();

        $data['causas'] = Causa::where('tipo', 'Sanción')->get();


        return view('procesos.documentales.sanciones.create', $data);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'inscripcion_id' => [
                'required',
            ],
            'causa_id' => [
                'required',
            ],
            'tipo' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);

        $sancion = new Sancion;

        $sancion->inscripcion_id = $request->inscripcion_id;
        $sancion->causa_id = $request->causa_id;
        $sancion->tipo = $request->tipo;
        $sancion->observacion = $request->observacion;

        $sancion->save();

        AppHelper::instance()->logUserActivity('sanciones', 'creacion');

        return redirect('procesos/documentales/sanciones')->with('success', 'success');
    }

    public function show(Sancion $sancion)
    {
        return view('procesos.documentales.sanciones.show', compact('sancion'));
    }

    public function edit(Sancion $sancion)
    {
        $causas = Causa::where('tipo', 'Sanción')->get();

        return view('procesos.documentales.sanciones.edit', compact('sancion', 'causas'));
    }

    public function update(Request $request, Sancion $sancion)
    {
        $validator = $request->validate([
            'causa_id' => [
                'required',
            ],
            'tipo' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);

        $sancion->causa_id = $request->causa_id;
        $sancion->tipo = $request->tipo;
        $sancion->observacion = $request->observacion;

        $sancion->save();

        AppHelper::instance()->logUserActivity('sanciones', 'actualizacion');

        return redirect('procesos/documentales/sanciones')->with('success', 'success');
    }


    public function anull(Sancion $sancion)
    {
								$someDate = new \DateTime($sancion->created_at);
								$now = new \DateTime();

								if($someDate->diff($now)->days > 30) {
												return redirect('procesos/documentales/sanciones')->with('nopuedeanular', 'success');
								}

								$sancion->estado = 'Anulado';

        $sancion->save();

        AppHelper::instance()->logUserActivity('sanciones', 'actualizacion');

        return redirect('procesos/documentales/sanciones')->with('success', 'success');
    }
}
