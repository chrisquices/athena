<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Bachillerato;
use App\Models\Area;

class BachilleratoController extends Controller
{
    public function index()
    {
        $bachilleratos = Bachillerato::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.bachilleratos.index', compact('bachilleratos'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-academicos.bachilleratos.create');
    }

    public function show(Bachillerato $bachillerato)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.bachilleratos.show', compact('bachillerato'));
    }

    public function edit(Bachillerato $bachillerato)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.bachilleratos.edit', compact('bachillerato'));
    }

    public function store(Request $request, Bachillerato $bachillerato)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('bachilleratos')->ignore($bachillerato)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('bachilleratos')->ignore($bachillerato)
            ],
        ]);

        $bachillerato->nombre = $request->nombre;
        $bachillerato->acronimo = $request->acronimo;

        $bachillerato->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/bachilleratos')->with('success', 'success');
    }

    public function update(Request $request, Bachillerato $bachillerato)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('bachilleratos')->ignore($bachillerato)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('bachilleratos')->ignore($bachillerato)
            ],
        ]);

        $bachillerato->nombre = $request->nombre;
        $bachillerato->acronimo = $request->acronimo;

        $bachillerato->save();

        return redirect('mantenimiento-seguridad/referenciales-academicos/bachilleratos')->with('success', 'success');
    }

    public function delete(Bachillerato $bachillerato)
    {
        try {
            $bachillerato->delete();

            return redirect('mantenimiento-seguridad/referenciales-academicos/bachilleratos')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/bachilleratos')->with('error', 'error');
        }
    }
}
