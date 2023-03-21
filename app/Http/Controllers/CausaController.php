<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Causa;

class CausaController extends Controller
{
    public function index()
    {
        $causas = Causa::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-operativos.causas.index', compact('causas'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-operativos.causas.create');
    }

    public function show(Causa $causa)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.causas.show', compact('causa'));
    }

    public function edit(Causa $causa)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.causas.edit', compact('causa'));
    }

    public function store(Request $request, Causa $causa)
    {
        $validator = $request->validate([
            'tipo' => [
                'required',
            ],
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('causas')->ignore($causa)
            ],
        ]);

        $causa->tipo = $request->tipo;
        $causa->nombre = $request->nombre;

        $causa->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/causas')->with('success', 'success');
    }

    public function update(Request $request, Causa $causa)
    {
        $validator = $request->validate([
            'tipo' => [
                'required',
            ],
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('causas')->ignore($causa)
            ],
        ]);

        $causa->tipo = $request->tipo;
        $causa->nombre = $request->nombre;

        $causa->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/causas')->with('success', 'success');
    }

    public function delete(Causa $causa)
    {
        try {
            $causa->delete();

            return redirect('mantenimiento-seguridad/referenciales-operativos/causas')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-operativos/causas')->with('error', 'error');
        }
    }
}
