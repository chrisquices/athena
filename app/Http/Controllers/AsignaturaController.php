<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Asignatura;
use App\Models\Area;
use App\Helpers\AppHelper;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::with('area')->orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        $areas = Area::all();

        return view('mantenimiento-seguridad.referenciales-academicos.asignaturas.create', compact('areas'));
    }

    public function show(Asignatura $asignatura)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.asignaturas.show', compact('asignatura'));
    }

    public function edit(Asignatura $asignatura)
    {
        $areas = Area::all();

        return view('mantenimiento-seguridad.referenciales-academicos.asignaturas.edit', compact('asignatura', 'areas'));
    }

    public function store(Request $request, Asignatura $asignatura)
    {
        $validator = $request->validate([
            'area_id' => [
                'required',
            ],
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('asignaturas')->ignore($asignatura)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('asignaturas')->ignore($asignatura)
            ],
        ]);

        $asignatura->area_id = $request->area_id;
        $asignatura->nombre = $request->nombre;
        $asignatura->acronimo = $request->acronimo;

        $asignatura->save();

        AppHelper::instance()->logUserActivity('asignaturas', 'creacion');

        return redirect('mantenimiento-seguridad/referenciales-academicos/asignaturas')->with('success', 'success');
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $validator = $request->validate([
            'area_id' => [
                'required',
            ],
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('asignaturas')->ignore($asignatura)
            ],
            'acronimo' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('asignaturas')->ignore($asignatura)
            ],
        ]);

        $asignatura->area_id = $request->area_id;
        $asignatura->nombre = $request->nombre;
        $asignatura->acronimo = $request->acronimo;

        $asignatura->save();

        AppHelper::instance()->logUserActivity('asignaturas', 'actualizacion');

        return redirect('mantenimiento-seguridad/referenciales-academicos/asignaturas')->with('success', 'success');
    }

    public function delete(Asignatura $asignatura)
    {
        try {
            $asignatura->delete();

            AppHelper::instance()->logUserActivity('asignaturas', 'eliminacion');

            return redirect('mantenimiento-seguridad/referenciales-academicos/asignaturas')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/asignaturas')->with('error', 'error');
        }
    }
}
