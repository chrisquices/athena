<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\PlanCurso;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Requisito;
use App\Models\RequisitoInscripcion;
use DB;

class RequisitoInscripcionController extends Controller
{
    public function index()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.academicos.requisitos-inscripciones.index', compact('planes_cursos'));
    }

    public function getRequisitosInscripciones(Request $request)
    {
        return RequisitoInscripcion::with('requisito')->where('plan_curso_id', $request->id)->get();
    }

    public function create()
    {
        $planes_cursos_existentes = RequisitoInscripcion::distinct()->pluck('plan_curso_id');

        $planes_cursos = PlanCurso::whereNotIn('id', $planes_cursos_existentes)->get();

        $requisitos = Requisito::all();

        return view('procesos.academicos.requisitos-inscripciones.create', compact('planes_cursos', 'requisitos'));
    }

    public function show(PlanCurso $plan_curso)
    {
        $requisitos_inscripciones = RequisitoInscripcion::where('plan_curso_id', $plan_curso->id)->get();

        return view('procesos.academicos.requisitos-inscripciones.show', compact('plan_curso', 'requisitos_inscripciones'));
    }

    public function store(Request $request, RequisitoInscripcion $requisito_inscripcion)
    {
        $validator = $request->validate([
            'plan_curso_id' => [
                'required',
            ],
            'requisito_id' => [
                'required',
            ],
        ]);

        for ($i = 0; $i < count($request->requisito_id); $i++) {
            $requisito_inscripcion = new RequisitoInscripcion;

            $requisito_inscripcion->plan_curso_id = $request->plan_curso_id;
            $requisito_inscripcion->requisito_id = $request->requisito_id[$i];

            $requisito_inscripcion->save();

            AppHelper::instance()->logUserActivity('requisitos_inscripciones', 'creacion');
        }


        return redirect('procesos/academicos/requisitos-inscripciones')->with('success', 'success');
    }

    public function edit(PlanCurso $plan_curso)
    {
        $requisitos = Requisito::all();

        $requisitos_inscripciones = RequisitoInscripcion::where('plan_curso_id', $plan_curso->id)->get();

        foreach ($requisitos as $key => $requisito) {
            foreach ($requisitos_inscripciones as $subkey => $requisito_inscripcion) {
                if ($requisito->id == $requisito_inscripcion->requisito_id) {
                    $requisito['checked'] = true;
                }
            }
        }

        return view('procesos.academicos.requisitos-inscripciones.edit', compact('plan_curso', 'requisitos'));
    }

    public function update(Request $request, RequisitoInscripcion $requisito_inscripcion)
    {
        $validator = $request->validate([
            'plan_curso_id' => [
                'required',
            ],
            'requisito_id' => [
                'required',
            ],
        ]);

        RequisitoInscripcion::where('plan_curso_id', $request->plan_curso_id)->delete();

        $to_insert = [];

        foreach ($request->requisito_id as $key => $requisito) {
            array_push($to_insert, [
                'plan_curso_id' => $request->plan_curso_id,
                'requisito_id' => $requisito,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        RequisitoInscripcion::upsert($to_insert, [
            'plan_curso_id', 'requisito_id'
        ]);

        AppHelper::instance()->logUserActivity('requisitos_inscripciones', 'actualizacion');

        return redirect('procesos/academicos/requisitos-inscripciones')->with('success', 'success');
    }

    public function print(PlanCurso $plan_curso)
    {
        $requisitos_inscripciones = RequisitoInscripcion::where('plan_curso_id', $plan_curso->id)->get();

        return view('procesos.academicos.requisitos-inscripciones.print', compact('plan_curso', 'requisitos_inscripciones'));
    }

    public function delete(RequisitoInscripcion $requisito_inscripcion)
    {
        try {
            $requisito_inscripcion->delete();

            return redirect('procesos/academicos/requisitos-inscripciones')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/academicos/requisitos-inscripciones')->with('error', 'error');
        }
    }
}
