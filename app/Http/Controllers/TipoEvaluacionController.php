<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TipoEvaluacion;

class TipoEvaluacionController extends Controller
{
    public function index()
    {
        $tipos_evaluaciones = TipoEvaluacion::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.tipos-evaluaciones.index', compact('tipos_evaluaciones'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-academicos.tipos-evaluaciones.create');
    }

    public function show(TipoEvaluacion $tipo_evaluacion)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.tipos-evaluaciones.show', compact('tipo_evaluacion'));
    }

    public function edit(TipoEvaluacion $tipo_evaluacion)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.tipos-evaluaciones.edit', compact('tipo_evaluacion'));
    }

    public function store(Request $request, TipoEvaluacion $tipo_evaluacion)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('tipos_evaluaciones')->ignore($tipo_evaluacion)
            ],
        ]);

        $tipo_evaluacion->nombre = $request->nombre;

        $tipo_evaluacion->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/tipos-evaluaciones')->with('success', 'success');
    }

    public function update(Request $request, TipoEvaluacion $tipo_evaluacion)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('tipos_evaluaciones')->ignore($tipo_evaluacion)
            ],
        ]);

        $tipo_evaluacion->nombre = $request->nombre;

        $tipo_evaluacion->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/tipos-evaluaciones')->with('success', 'success');
    }

    public function delete(TipoEvaluacion $tipo_evaluacion)
    {
        try {
            $tipo_evaluacion->delete();

            return redirect('mantenimiento-seguridad/referenciales-academicos/tipos-evaluaciones')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/tipos-evaluaciones')->with('error', 'error');
        }
    }
}
