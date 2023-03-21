<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Bachillerato;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Models\MallaCurricular;
use App\Models\PlanCurso;
use App\Models\Sede;
use Auth;
use DB;

class PlanCursoController extends Controller
{
    public function index()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.academicos.planes-cursos.index', compact('planes_cursos'));
    }

    public function create()
    {
        $sedes = Sede::all();
        $mallas_curriculares = MallaCurricular::where('estado', 'Activo')->get();
        $grados = Grado::all();

        return view('procesos.academicos.planes-cursos.create', compact('sedes', 'mallas_curriculares', 'grados'));
    }

    public function store(Request $request, PlanCurso $plan_curso)
    {
        $validator = $request->validate([
            'sede_id' => [
                'required',
            ],
            'malla_curricular_id' => [
                'required',
            ],
            'grado_id' => [
                'required',
            ],
            'turno' => [
                'required',
            ],
            'seccion' => [
                'required',
            ],
            'promedio_requerido' => [
                'required',
                'integer'
            ],
            'fecha_inicio' => [
                'required',
            ],
            'fecha_fin' => [
                'required',
            ],
        ]);

        $plan_curso->sede_id = $request->sede_id;
        $plan_curso->malla_curricular_id = $request->malla_curricular_id;
        $plan_curso->grado_id = $request->grado_id;
        $plan_curso->turno = $request->turno;
        $plan_curso->seccion = $request->seccion;
        $plan_curso->promedio_requerido = $request->promedio_requerido;
        $plan_curso->fecha_inicio = $request->fecha_inicio;
        $plan_curso->fecha_fin = $request->fecha_fin;

        $plan_curso->save();

        AppHelper::instance()->logUserActivity('planes_cursos', 'creacion');

        return redirect('procesos/academicos/planes-cursos')->with('success', 'success');
    }

    public function print(PlanCurso $plan_curso)
    {
        AppHelper::instance()->logUserActivity('planes_cursos', 'generacion');

        return view('procesos.academicos.planes-cursos.print', compact('plan_curso'));
    }

    public function show(PlanCurso $plan_curso)
    {
        return view('procesos.academicos.planes-cursos.show', compact('plan_curso'));
    }

    public function edit(PlanCurso $plan_curso)
    {
        $sedes = Sede::all();
        $mallas_curriculares = MallaCurricular::all();
        $grados = Grado::all();

        return view('procesos.academicos.planes-cursos.edit', compact('plan_curso', 'sedes', 'mallas_curriculares', 'grados'));
    }

    public function update(Request $request, PlanCurso $plan_curso)
    {
        $validator = $request->validate([
            'sede_id' => [
                'required',
            ],
            'malla_curricular_id' => [
                'required',
            ],
            'grado_id' => [
                'required',
            ],
            'turno' => [
                'required',
            ],
            'seccion' => [
                'required',
            ],
            'promedio_requerido' => [
                'required',
                'integer'
            ],
            'fecha_inicio' => [
                'required',
            ],
            'fecha_fin' => [
                'required',
            ],
        ]);

        $plan_curso->sede_id = $request->sede_id;
        $plan_curso->malla_curricular_id = $request->malla_curricular_id;
        $plan_curso->grado_id = $request->grado_id;
        $plan_curso->turno = $request->turno;
        $plan_curso->seccion = $request->seccion;
        $plan_curso->promedio_requerido = $request->promedio_requerido;
        $plan_curso->fecha_inicio = $request->fecha_inicio;
        $plan_curso->fecha_fin = $request->fecha_fin;

        $plan_curso->save();

        AppHelper::instance()->logUserActivity('planes_cursos', 'actualizacion');

        return redirect('procesos/academicos/planes-cursos')->with('success', 'success');
    }

    public function anull(PlanCurso $plan_curso)
    {
        try {
												$someDate = new \DateTime($plan_curso->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/academicos/planes-cursos')->with('nopuedeanular', 'success');
												}

            $plan_curso->estado = 'Anulado';

            $plan_curso->save();

            AppHelper::instance()->logUserActivity('planes_cursos', 'anulacion');

            return redirect('procesos/academicos/planes-cursos')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/academicos/planes-cursos')->with('error', 'error');
        }
    }

				public function finalizar(Request $request) {
								$planes_cursos = PlanCurso::where('estado', 'Activo')->get();

								foreach ($planes_cursos as $plan_curso) {
												$finalize = PlanCurso::find($plan_curso->id);

												$finalize->estado = 'Finalizado';

												$finalize->save();
								}

								return redirect('procesos/academicos/planes-cursos')->with('success', 'success');
				}
}
