<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Contrato;
use App\Models\PlanCurso;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Horario;
use App\Models\HorarioDetalle;
use DB;

class HorarioController extends Controller
{
    public function index()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        $horarios = Horario::where('estado', 'Activo')->get();

        return view('procesos.academicos.horarios.index', compact('planes_cursos', 'horarios'));
    }

    public function create()
    {
        $planes_cursos = PlanCurso::where('estado', 'Activo')->get();

        $contratos = Contrato::where('estado', 'Activo')->get();

        return view('procesos.academicos.horarios.create', compact('planes_cursos', 'contratos'));
    }

    public function getDias(Request $request)
    {
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];

        $dias_registrados = Horario::where('plan_curso_id', $request->id)->pluck('dia')->toArray();

        $dias_disponibles = array_values(array_diff($dias, $dias_registrados));

        return $dias_disponibles;
    }

    public function getHorarios(Request $request)
    {
        return Horario::where('plan_curso_id', $request->plan_curso_id)->get();
    }

    public function getAsignaturas(Request $request)
    {
        $plan_curso = PlanCurso::find($request->id);

        $asignaturas_habilitadas = AsignaturaMallaCurricular::where([
            ['malla_curricular_id', $plan_curso->malla_curricular_id],
            ['grado_id', $plan_curso->grado_id]
        ])->pluck('asignatura_id');

        return Asignatura::find($asignaturas_habilitadas);
    }

    public function show($horario)
    {
        $plan_curso = PlanCurso::find($horario);

        $horarios = Horario::where('plan_curso_id', $plan_curso->id)->get();

        foreach ($horarios as $key => $horario) {
            $horario['detalle'] = HorarioDetalle::with('asignatura')->where('horario_id', $horario->id)->get();
        }

        return view('procesos.academicos.horarios.show', compact('plan_curso', 'horarios'));
    }

    public function edit($horario)
    {
        $horario = Horario::find($horario);

        $horario['detalle'] = HorarioDetalle::with('asignatura')->where('horario_id', $horario->id)->get();

        $asignaturas_habilitadas = AsignaturaMallaCurricular::where([
            ['malla_curricular_id', $horario->plan_curso->malla_curricular_id],
            ['grado_id', $horario->plan_curso->grado_id]
        ])->pluck('asignatura_id');

        $asignaturas = Asignatura::find($asignaturas_habilitadas);
								$docentes = Contrato::where('estado', 'Activo')->get();

        return view('procesos.academicos.horarios.edit', compact('horario', 'asignaturas', 'docentes'));
    }

    public function store(Request $request, Horario $horario)
    {
        $validator = $request->validate([
            'plan_curso_id' => [
                'required',
            ],
            'dia' => [
                'required',
            ],
            'asignatura_id' => [
                'required',
            ],
            'hora_desde' => [
                'required',
            ],
            'hora_hasta' => [
                'required',
            ],
        ]);

        if (count($request->asignatura_id) == 6) {
            return back()-with('error', 'error');
        }

        $horario->plan_curso_id = $request->plan_curso_id;
        $horario->dia = $request->dia;

        $horario->save();

        AppHelper::instance()->logUserActivity('horarios', 'creacion');

        $this->storeDetails($horario, $request);

        return redirect('procesos/academicos/horarios')->with('success', 'success');
    }

    public function storeDetails($horario, $request)
    {
        for ($i = 0; $i < 7; $i++) {
            $horario_detalle = new HorarioDetalle();

            $horario_detalle->hora = $i + 1;
            $horario_detalle->horario_id = $horario->id;
            $horario_detalle->contrato_id = (isset($request->contrato_id)) ? $request->contrato_id[$i] : null;
            $horario_detalle->asignatura_id = $request->asignatura_id[$i];
            $horario_detalle->hora_desde = $request->hora_desde[$i];
            $horario_detalle->hora_hasta = $request->hora_hasta[$i];

            $horario_detalle->save();
        }

        AppHelper::instance()->logUserActivity('horarios_detalle', 'creacion');
    }

    public function update(Request $request, Horario $horario)
    {
        for ($i = 0; $i < 7; $i++) {
            $horario_detalle = HorarioDetalle::find($request->horario_detalle_id[$i]);

            $horario_detalle->horario_id = $horario->id;
            $horario_detalle->contrato_id = (isset($request->contrato_id)) ? $request->contrato_id[$i] : null;
            $horario_detalle->asignatura_id = $request->asignatura_id[$i];
            $horario_detalle->hora_desde = $request->hora_desde[$i];
            $horario_detalle->hora_hasta = $request->hora_hasta[$i];

            $horario_detalle->save();
        }

        AppHelper::instance()->logUserActivity('horarios_detalle', 'actualizacion');

        return redirect('procesos/academicos/horarios')->with('success', 'success');
    }

    public function print($plan_curso)
    {
        $plan_curso = PlanCurso::find($plan_curso);

        $horarios = Horario::where('plan_curso_id', $plan_curso->id)->get();

        foreach ($horarios as $key => $horario) {
            $horario['detalle'] = HorarioDetalle::with('asignatura', 'contrato.postulante')->where('horario_id', $horario->id)->get();
        }

        return view('procesos.academicos.horarios.print', compact('plan_curso', 'horarios'));
    }
}
