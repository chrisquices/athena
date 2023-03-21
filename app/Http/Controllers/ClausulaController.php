<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Clausula;

class ClausulaController extends Controller
{
    public function index()
    {
        $clausulas = Clausula::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-operativos.clausulas.index', compact('clausulas'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-operativos.clausulas.create');
    }

    public function show(Clausula $clausula)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.clausulas.show', compact('clausula'));
    }

    public function edit(Clausula $clausula)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.clausulas.edit', compact('clausula'));
    }

    public function store(Request $request, Clausula $clausula)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('clausulas')->ignore($clausula)
            ]
        ]);

        $clausula->nombre = $request->nombre;

        $clausula->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/clausulas')->with('success', 'success');
    }

    public function update(Request $request, Clausula $clausula)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('clausulas')->ignore($clausula)
            ]
        ]);

        $clausula->nombre = $request->nombre;

        $clausula->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/clausulas')->with('success', 'success');
    }

    public function delete(Clausula $clausula)
    {
        try {
            $clausula->delete();

            return redirect('mantenimiento-seguridad/referenciales-operativos/clausulas')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-operativos/clausulas')->with('error', 'error');
        }
    }
}
