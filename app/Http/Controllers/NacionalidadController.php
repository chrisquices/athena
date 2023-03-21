<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Nacionalidad;

class NacionalidadController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidad::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-documentales.nacionalidades.index', compact('nacionalidades'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-documentales.nacionalidades.create');
    }

    public function show(Nacionalidad $nacionalidad)
    {
        return view('mantenimiento-seguridad.referenciales-documentales.nacionalidades.show', compact('nacionalidad'));
    }

    public function edit(Nacionalidad $nacionalidad)
    {
        return view('mantenimiento-seguridad.referenciales-documentales.nacionalidades.edit', compact('nacionalidad'));
    }

    public function store(Request $request, Nacionalidad $nacionalidad)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nacionalidades')->ignore($nacionalidad)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nacionalidades')->ignore($nacionalidad)
            ],
        ]);

        $nacionalidad->nombre = $request->nombre;
        $nacionalidad->acronimo = $request->acronimo;

        $nacionalidad->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/nacionalidades')->with('success', 'success');
    }

    public function update(Request $request, Nacionalidad $nacionalidad)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nacionalidades')->ignore($nacionalidad)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('nacionalidades')->ignore($nacionalidad)
            ],
        ]);

        $nacionalidad->nombre = $request->nombre;
        $nacionalidad->acronimo = $request->acronimo;

        $nacionalidad->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/nacionalidades')->with('success', 'success');
    }

    public function delete(Nacionalidad $nacionalidad)
    {
        try {
            $nacionalidad->delete();

            return redirect('mantenimiento-seguridad/referenciales-documentales/nacionalidades')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-documentales/nacionalidades')->with('error', 'error');
        }
    }
}
