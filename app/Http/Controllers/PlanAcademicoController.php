<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Bachillerato;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Models\MallaCurricular;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use App\Models\Sede;
use Auth;
use DB;

class PlanAcademicoController extends Controller
{
    public function index()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.academicos.planes-academicos.index', compact('planes_cursos'));
    }

    public function getPlanesAcademicos(Request $request)
    {
        return PlanAcademico::with('asignatura')->where('plan_curso_id', $request->plan_curso_id)->get();
    }

    public function create()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.academicos.planes-academicos.create', compact('planes_cursos'));
    }

    public function getAsignaturas(Request $request)
    {
        $plan_curso = PlanCurso::find($request->id);

        $asignaturas_habilitadas = AsignaturaMallaCurricular::where([
            ['malla_curricular_id', $plan_curso->malla_curricular_id],
            ['grado_id', $plan_curso->grado_id]
        ])->pluck('asignatura_id');

        $asignaturas_existentes = PlanAcademico::where([
            ['plan_curso_id', $plan_curso->id],
            ['estado', 'Activo']
        ])->pluck('asignatura_id');

        return Asignatura::whereIn('id', $asignaturas_habilitadas)->whereNotIn('id', $asignaturas_existentes)->get();
    }

    public function store(Request $request, PlanAcademico $plan_academico)
    {
        $validator = $request->validate([
            'plan_curso_id' => [
                'required',
            ],
            'asignatura_id' => [
                'required',
            ],
            'modalidad' => [
                'required',
            ],
            'alcances' => [
                'required',
            ],
            'contenidos' => [
                'required',
            ],
            'actividades' => [
                'required',
            ],
            'instrumentos' => [
                'required',
            ],
        ]);

        $plan_academico->plan_curso_id = $request->plan_curso_id;
        $plan_academico->asignatura_id = $request->asignatura_id;
        $plan_academico->modalidad = $request->modalidad;
        $plan_academico->alcances = $request->alcances;
        $plan_academico->contenidos = $request->contenidos;
        $plan_academico->actividades = $request->actividades;
        $plan_academico->instrumentos = $request->instrumentos;

        $plan_academico->save();

        AppHelper::instance()->logUserActivity('planes_academicos', 'creacion');

        return redirect('procesos/academicos/planes-academicos')->with('success', 'success');
    }

    public function print(PlanAcademico $plan_academico)
    {

        AppHelper::instance()->logUserActivity('planes_cursos', 'generacion');

        return view('procesos.academicos.planes-academicos.print', compact('plan_academico'));
    }

    public function show(PlanAcademico $plan_academico)
    {
        return view('procesos.academicos.planes-academicos.show', compact('plan_academico'));
    }

    public function edit(PlanAcademico $plan_academico)
    {
        $planes_cursos = PlanCurso::all();

        return view('procesos.academicos.planes-academicos.edit', compact('plan_academico', 'planes_cursos'));
    }

    public function update(Request $request, PlanAcademico $plan_academico)
    {
        $validator = $request->validate([
            'alcances' => [
                'required',
            ],
            'contenidos' => [
                'required',
            ],
            'actividades' => [
                'required',
            ],
            'instrumentos' => [
                'required',
            ],
        ]);

        $plan_academico->alcances = $request->alcances;
        $plan_academico->contenidos = $request->contenidos;
        $plan_academico->actividades = $request->actividades;
        $plan_academico->instrumentos = $request->instrumentos;

        $plan_academico->save();

        AppHelper::instance()->logUserActivity('planes_academicos', 'actualizacion');

        return redirect('procesos/academicos/planes-academicos')->with('success', 'success');
    }

    public function anull(PlanAcademico $plan_academico)
    {
        try {
												$someDate = new \DateTime($plan_academico->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/academicos/planes-academicos')->with('nopuedeanular', 'success');
												}

            $plan_academico->estado = 'Anulado';

            $plan_academico->save();

            AppHelper::instance()->logUserActivity('planes_academicos', 'anulacion');

            return redirect('procesos/academicos/planes-academicos')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/academicos/planes-academicos')->with('error', 'error');
        }
    }
}
