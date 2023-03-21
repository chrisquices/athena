<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Asignatura;
use App\Models\AsignaturaPostulante;
use App\Models\Ciudad;
use App\Models\Postulante;
use Illuminate\Http\Request;
use App\Models\PlanCurso;
use App\Models\Reemplazante;
use Illuminate\Validation\Rule;

class ReemplazanteController extends Controller
{
    public function index()
    {
        $data['reemplazantes'] = Reemplazante::all();

        return view('procesos.operativos.reemplazantes.index', $data);
    }

    public function create()
    {
        $data['ciudades'] = Ciudad::all();
        $data['asignaturas'] = Asignatura::all();

        return view('procesos.operativos.reemplazantes.create', $data);
    }

    public function store(Request $request, Reemplazante $reemplazante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
            ],
            'apellido' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
        ]);

        $reemplazante->nombre = $request->nombre;
        $reemplazante->apellido = $request->apellido;
        $reemplazante->telefono = $request->telefono;
        $reemplazante->direccion = $request->direccion;

        $reemplazante->save();

        AppHelper::instance()->logUserActivity('reemplazantes', 'creacion');

        return redirect('procesos/operativos/reemplazantes')->with('success', 'success');
    }

    public function show(Reemplazante $reemplazante)
    {
        $data['reemplazante'] = $reemplazante;

        return view('procesos.operativos.reemplazantes.show', $data);
    }

    public function edit(Reemplazante $reemplazante)
    {
        $data['reemplazante'] = $reemplazante;

        return view('procesos.operativos.reemplazantes.edit', $data);
    }

    public function update(Request $request, Reemplazante $reemplazante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
            ],
            'apellido' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
        ]);

        $reemplazante->nombre = $request->nombre;
        $reemplazante->apellido = $request->apellido;
        $reemplazante->telefono = $request->telefono;
        $reemplazante->direccion = $request->direccion;

        $reemplazante->save();

        AppHelper::instance()->logUserActivity('reemplazantes', 'actualizacion');

        return redirect('procesos/operativos/reemplazantes')->with('success', 'success');
    }
}
