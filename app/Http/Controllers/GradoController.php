<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Grado;
use App\Models\Area;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.grados.index', compact('grados'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-academicos.grados.create');
    }

    public function show(Grado $grado)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.grados.show', compact('grado'));
    }

    public function edit(Grado $grado)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.grados.edit', compact('grado'));
    }

    public function store(Request $request, Grado $grado)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('grados')->ignore($grado)
            ],
            'nombre_alternativo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('grados')->ignore($grado)
            ],
            'nivel' => [
                'required',
            ],
            'nivel_acronimo' => [
                'required',
            ],
        ]);

        $grado->nombre = $request->nombre;
        $grado->nombre_alternativo = $request->nombre_alternativo;
        $grado->nivel = $request->nivel;
        $grado->nivel_acronimo = $request->nivel_acronimo;

        $grado->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/grados')->with('success', 'success');
    }

    public function update(Request $request, Grado $grado)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('grados')->ignore($grado)
            ],
            'nombre_alternativo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('grados')->ignore($grado)
            ],
            'nivel' => [
                'required',
            ],
            'nivel_acronimo' => [
                'required',
            ],
        ]);

        $grado->nombre = $request->nombre;
        $grado->nombre_alternativo = $request->nombre_alternativo;
        $grado->nivel = $request->nivel;
        $grado->nivel_acronimo = $request->nivel_acronimo;

        $grado->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/grados')->with('success', 'success');
    }

    public function delete(Grado $grado)
    {
        try {
            $grado->delete();

            return redirect('mantenimiento-seguridad/referenciales-academicos/grados')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/grados')->with('error', 'error');
        }
    }
}
