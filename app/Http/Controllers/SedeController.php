<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Sede;

class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-sistema.sedes.index', compact('sedes'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-sistema.sedes.create');
    }

    public function show(Sede $sede)
    {
        return view('mantenimiento-seguridad.referenciales-sistema.sedes.show', compact('sede'));
    }

    public function edit(Sede $sede)
    {
        return view('mantenimiento-seguridad.referenciales-sistema.sedes.edit', compact('sede'));
    }

    public function store(Request $request, Sede $sede)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
            'telefono' => [
                'required',
                'between:1,255',
                Rule::unique('sedes')->ignore($sede)
            ],
            'direccion' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
        ]);

        $sede->nombre = $request->nombre;
        $sede->acronimo = $request->acronimo;
        $sede->telefono = $request->telefono;
        $sede->direccion = $request->direccion;

        $sede->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/sedes')->with('success', 'success');
    }

    public function update(Request $request, Sede $sede)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
            'telefono' => [
                'required',
                'between:1,255',
                Rule::unique('sedes')->ignore($sede)
            ],
            'direccion' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('sedes')->ignore($sede)
            ],
        ]);

        $sede->nombre = $request->nombre;
        $sede->acronimo = $request->acronimo;
        $sede->telefono = $request->telefono;
        $sede->direccion = $request->direccion;

        $sede->save();

        return redirect('mantenimiento-seguridad/referenciales-sistema/sedes')->with('success', 'success');
    }

    public function delete(Sede $sede)
    {
        try {
            $sede->delete();

            return redirect('mantenimiento-seguridad/referenciales-sistema/sedes')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-sistema/sedes')->with('error', 'error');
        }
    }
}
