<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Requisito;

class RequisitoController extends Controller
{
    public function index()
    {
        $requisitos = Requisito::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.requisitos.index', compact('requisitos'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-academicos.requisitos.create');
    }

    public function show(Requisito $requisito)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.requisitos.show', compact('requisito'));
    }

    public function edit(Requisito $requisito)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.requisitos.edit', compact('requisito'));
    }

    public function store(Request $request, Requisito $requisito)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('requisitos')->ignore($requisito)
            ],
        ]);

        $requisito->nombre = $request->nombre;

        $requisito->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/requisitos')->with('success', 'success');
    }

    public function update(Request $request, Requisito $requisito)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('requisitos')->ignore($requisito)
            ],
        ]);

        $requisito->nombre = $request->nombre;

        $requisito->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/requisitos')->with('success', 'success');
    }

    public function delete(Requisito $requisito)
    {
        try {
            $requisito->delete();

            return redirect('mantenimiento-seguridad/referenciales-academicos/requisitos')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/requisitos')->with('error', 'error');
        }
    }
}
