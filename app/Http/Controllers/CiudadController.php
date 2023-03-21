<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-operativos.ciudades.index', compact('ciudades'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-operativos.ciudades.create');
    }

    public function show(Ciudad $ciudad)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.ciudades.show', compact('ciudad'));
    }

    public function edit(Ciudad $ciudad)
    {
        return view('mantenimiento-seguridad.referenciales-operativos.ciudades.edit', compact('ciudad'));
    }

    public function store(Request $request, Ciudad $ciudad)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('ciudades')->ignore($ciudad)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('ciudades')->ignore($ciudad)
            ],
        ]);

        $ciudad->nombre = $request->nombre;
        $ciudad->acronimo = $request->acronimo;

        $ciudad->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/ciudades')->with('success', 'success');
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('ciudades')->ignore($ciudad)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('ciudades')->ignore($ciudad)
            ],
        ]);

        $ciudad->nombre = $request->nombre;
        $ciudad->acronimo = $request->acronimo;

        $ciudad->save();

        return redirect('mantenimiento-seguridad/referenciales-operativos/ciudades')->with('success', 'success');
    }

    public function delete(Ciudad $ciudad)
    {
        try {
            $ciudad->delete();

            return redirect('mantenimiento-seguridad/referenciales-operativos/ciudades')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-operativos/ciudades')->with('error', 'error');
        }
    }
}
