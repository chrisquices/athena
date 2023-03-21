<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Asignatura;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;

class HelperController extends Controller
{
    public function getAsignaturas(Request $request)
    {
        if ($request) {
            return Asignatura::where('area_id', $request->id)->get();
        }

        return Asignatura::all();
    }

    public function getPlanesCursos()
    {
        return PlanCurso::where('estado', 'Activo')->get();
    }
}
