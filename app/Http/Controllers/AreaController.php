<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Area;
use App\Helpers\AppHelper;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::withCount('asignatura')->orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-academicos.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('mantenimiento-seguridad.referenciales-academicos.areas.create');
    }

    public function show(Area $area)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.areas.show', compact('area'));
    }

    public function edit(Area $area)
    {
        return view('mantenimiento-seguridad.referenciales-academicos.areas.edit', compact('area'));
    }

    public function store(Request $request, Area $area)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('areas')->ignore($area)
            ],
        ]);

        $area->nombre = $request->nombre;

        $area->save();

        AppHelper::instance()->logUserActivity('areas', 'creacion');

        return redirect('mantenimiento-seguridad/referenciales-academicos/areas')->with('success', 'success');
    }

    public function update(Request $request, Area $area)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
                Rule::unique('areas')->ignore($area)
            ],
        ]);

        $area->nombre = $request->nombre;

        $area->save();

        AppHelper::instance()->logUserActivity('areas', 'actualizacion');

        return redirect('mantenimiento-seguridad/referenciales-academicos/areas')->with('success', 'success');
    }

    public function delete(Area $area)
    {
        try {
            $area->delete();

            AppHelper::instance()->logUserActivity('areas', 'eliminacion');

            return redirect('mantenimiento-seguridad/referenciales-academicos/areas')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-academicos/areas')->with('error', 'error');
        }
    }
}
