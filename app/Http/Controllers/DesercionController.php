<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Causa;
use App\Models\Desercion;
use App\Models\Inscripcion;
use App\Models\Sancion;
use Illuminate\Http\Request;

class DesercionController extends Controller
{
    public function index()
    {
        $data['deserciones'] = Desercion::with('causa', 'inscripcion.estudiante')
            ->get();

        return view('procesos.documentales.deserciones.index', $data);
    }

    public function create()
    {
        $data['inscripciones'] = Inscripcion::with('estudiante')
            ->where('estado', 'Activo')
            ->get();

        $data['causas'] = Causa::where('tipo', 'Sanción')->get();

        return view('procesos.documentales.deserciones.create', $data);
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
            'fecha' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
        ]);

        $desercion = new Desercion;

        $desercion->inscripcion_id = $request->inscripcion_id;
        $desercion->causa_id = $request->causa_id;
        $desercion->observacion = $request->observacion;
        $desercion->fecha = $request->fecha;

        $desercion->save();

        AppHelper::instance()->logUserActivity('deserciones', 'creacion');

        $inscripcion = Inscripcion::find($desercion->inscripcion_id);

        $inscripcion->estado = 'Anulado';

        $inscripcion->save();

        AppHelper::instance()->logUserActivity('inscripciones', 'creacion');

        return redirect('procesos/documentales/deserciones')->with('success', 'success');
    }

    public function show(Desercion $desercion)
    {
        return view('procesos.documentales.deserciones.show', compact('desercion'));
    }

    public function edit(Desercion $desercion)
    {
        $causas = Causa::where('tipo', 'Deserción')->get();

        return view('procesos.documentales.deserciones.edit', compact('desercion', 'causas'));
    }

    public function anull(Desercion $desercion)
    {
								$someDate = new \DateTime($desercion->created_at);
								$now = new \DateTime();

								if($someDate->diff($now)->days > 30) {
												return redirect('procesos/documentales/deserciones')->with('nopuedeanular', 'success');
								}

								$desercion->estado = 'Anulado';

        $desercion->save();

        AppHelper::instance()->logUserActivity('deserciones', 'actualizacion');

        $inscripcion = Inscripcion::find($desercion->inscripcion_id);

        $inscripcion->estado = 'Activo';

        $inscripcion->save();

        AppHelper::instance()->logUserActivity('inscripciones', 'actualizacion');

        return redirect('procesos/documentales/deserciones')->with('success', 'success');
    }
}
