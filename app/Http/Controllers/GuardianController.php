<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Ciudad;
use App\Models\Guardian;

class GuardianController extends Controller
{
    public function index()
    {
        $guardianes = Guardian::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-documentales.guardianes.index', compact('guardianes'));
    }

    public function create()
    {
        $ciudades = Ciudad::all();
        $guardianes = Guardian::all();

        return view('mantenimiento-seguridad.referenciales-documentales.guardianes.create', compact('ciudades', 'guardianes'));
    }

    public function show(Guardian $guardian)
    {
        return view('mantenimiento-seguridad.referenciales-documentales.guardianes.show', compact('guardian'));
    }

    public function edit(Guardian $guardian)
    {
        $ciudades = Ciudad::all();
        $guardianes = Guardian::all();

        return view('mantenimiento-seguridad.referenciales-documentales.guardianes.edit', compact('guardian', 'ciudades', 'guardianes'));
    }

    public function store(Request $request, Guardian $guardian)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'apellido' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('guardianes')->ignore($guardian)
            ],
            'ciudad_id' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
        ]);

        $guardian->nombre = $request->nombre;
        $guardian->apellido = $request->apellido;
        $guardian->documento_tipo = $request->documento_tipo;
        $guardian->documento_numero = $request->documento_numero;
        $guardian->ciudad_id = $request->ciudad_id;
        $guardian->direccion = $request->direccion;
        $guardian->telefono = $request->telefono;

        $guardian->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/guardianes')->with('success', 'success');
    }

    public function update(Request $request, Guardian $guardian)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'apellido' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('guardianes')->ignore($guardian)
            ],
            'ciudad_id' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
        ]);

        $guardian->nombre = $request->nombre;
        $guardian->apellido = $request->apellido;
        $guardian->documento_tipo = $request->documento_tipo;
        $guardian->documento_numero = $request->documento_numero;
        $guardian->ciudad_id = $request->ciudad_id;
        $guardian->direccion = $request->direccion;
        $guardian->telefono = $request->telefono;

        $guardian->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/guardianes')->with('success', 'success');
    }

    public function delete(Guardian $guardian)
    {
        try {
            $guardian->delete();

            return redirect('mantenimiento-seguridad/referenciales-documentales/guardianes')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-documentales/guardianes')->with('error', 'error');
        }
    }
}
