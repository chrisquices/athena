<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Inscripcion;
use App\Models\PlanCurso;

class Formulario03Controller extends Controller
{
    public function index()
    {
        $data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.documentales.formularios-03.index', $data);
    }

    public function getInscripciones(Request $request)
    {
        return Inscripcion::with('estudiante')->where('plan_curso_id', $request->id)->get();
    }

    public function print($plan_curso)
    {
        $data['plan_curso'] = PlanCurso::find($plan_curso);
        $data['inscripciones'] = Inscripcion::where([
            ['estado', 'Activo'],
            ['plan_curso_id', $plan_curso]
        ])->get();

        return view('procesos.documentales.formularios-03.print', $data);
    }
}
