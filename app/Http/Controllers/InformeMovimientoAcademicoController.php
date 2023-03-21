<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Bachillerato;
use App\Models\Causa;
use App\Models\Ciudad;
use App\Models\Clausula;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Guardian;
use App\Models\Horario;
use App\Models\HorarioDetalle;
use App\Models\MallaCurricular;
use App\Models\Nacionalidad;
use App\Models\PlanAcademico;
use App\Models\PlanCurso;
use App\Models\PlanEvaluacion;
use App\Models\Requisito;
use App\Models\RequisitoInscripcion;
use App\Models\Sede;
use App\Models\TipoEvaluacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeMovimientoAcademicoController extends Controller
{
    public function mallaCurricular()
    {
        $data['tabla_nombre'] = 'Mallas Curriculares';
        $data['mallas_curriculares'] = MallaCurricular::all();

        return view('informes.movimientos.academicos.mallas-curriculares.index', $data);
    }

    public function planCurso()
    {
        $data['tabla_nombre'] = 'Planes de Cursos';
        $data['mallas_curriculares'] = MallaCurricular::all();
        $data['sedes'] = Sede::all();
        $data['grados'] = Grado::all();

        return view('informes.movimientos.academicos.planes-cursos.index', $data);
    }

    public function planAcademico()
    {
        $data['tabla_nombre'] = 'Planes Academicos';
        $data['planes_cursos'] = PlanCurso::all();
        return view('informes.movimientos.academicos.planes-academicos.index', $data);
    }

    public function horario()
    {
        $data['tabla_nombre'] = 'Horarios';
        $data['planes_cursos'] = PlanCurso::all();

        return view('informes.movimientos.academicos.horarios.index', $data);
    }

    public function requisitoInscripcion()
    {
        $data['tabla_nombre'] = 'Requisitos de Inscripcion';
        $data['planes_cursos'] = PlanCurso::all();

        return view('informes.movimientos.academicos.requisitos-inscripciones.index', $data);
    }

    public function planEvaluacion()
    {
        $data['tabla_nombre'] = 'Planes de Evaluaciones';
        $data['planes_cursos'] = PlanCurso::all();
        $data['tipos_evaluaciones'] = TipoEvaluacion::all();

        return view('informes.movimientos.academicos.planes-evaluaciones.index', $data);
    }

    public function print(Request $request)
    {
        $data['tabla'] = $request->tabla;
        $data['columnas'] = $request->columnas;
        $data['orientation'] = $request->orientation;
        $data['size'] = $request->size;

        switch ($data['tabla']) {
            case 'mallas_curriculares':
                $data['malla_curricular'] = MallaCurricular::find($request->malla_curricular_id);
                $data['malla_curricular_detalle'] = AsignaturaMallaCurricular::where('malla_curricular_id', $request->malla_curricular_id)->orderBy('plan')->get();
                $data['grados_ids'] = AsignaturaMallaCurricular::select('grado_id')->where('malla_curricular_id', $request->malla_curricular_id)->distinct()->get();
                $data['grados_ids_filtered'] = [];

                foreach ($data['grados_ids'] as $key => $grado_id) {
                    $data['grados_ids_filtered'][] = $grado_id->grado_id;
                }

                $data['grados'] = Grado::find($data['grados_ids_filtered']);

                $data['areas'] = Area::all();

                return view('procesos.academicos.mallas-curriculares.print', $data);

                break;

            case 'planes_cursos':
                $query = PlanCurso::query();

                if ($request->sede_id)
                    $query = $query->where('sede_id', $request->sede_id);

                if ($request->malla_curricular_id)
                    $query = $query->where('malla_curricular_id', $request->malla_curricular_id);

                if ($request->grado_id)
                    $query = $query->where('grado_id', $request->grado_id);

                if ($request->turno)
                    $query = $query->where('turno', $request->turno);

                if ($request->seccion)
                    $query = $query->where('seccion', $request->seccion);

                $data['registros'] = $query->get();

                return view('informes.movimientos.academicos.planes-cursos.print', $data);

                break;
            case 'planes_academicos':
                $planes_academicos = [];

                foreach ($request->planes_academicos as $key => $plan_academico) {
                    $planes_academicos[] = $key;
                }

                $data['planes_academicos'] = PlanAcademico::find($planes_academicos);

                return view('informes.movimientos.academicos.planes-academicos.print', $data);

                break;

            case 'horarios':
                $plan_curso = PlanCurso::find($request->plan_curso_id);

                $horarios = Horario::where('plan_curso_id', $request->plan_curso_id)->get();

                foreach ($horarios as $key => $horario) {
                    $horario['detalle'] = HorarioDetalle::with('asignatura', 'contrato.postulante')->where('horario_id', $horario->id)->get();
                }

                return view('informes.movimientos.academicos.horarios.print', compact('plan_curso', 'horarios'));

                break;

            case 'requisitos_inscripcion':
                $data['requisitos_inscripciones'] = RequisitoInscripcion::where('plan_curso_id', $request->plan_curso_id)->get();
                $data['plan_curso'] = PlanCurso::find($request->plan_curso_id);

                return view('informes.movimientos.academicos.requisitos-inscripciones.print', $data);

                break;

            case 'planes_evaluaciones':
                $query = PlanEvaluacion::query();

                if ($request->plan_curso_id)
                    $query = $query->where('plan_curso_id', $request->plan_curso_id);

                if ($request->tipo_evaluacion_id)
                    $query = $query->where('tipo_evaluacion_id', $request->tipo_evaluacion_id);

                if ($request->plan_academico_id)
                    $query = $query->where('plan_academico_id', $request->plan_academico_id);

                if ($request->fecha_desde && empty($request->fecha_hasta))
                    $query = $query->where('fecha', '>=', $request->fecha_desde);

                if ($request->fecha_hasta && empty($request->fecha_desde))
                    $query = $query->where('fecha', '<=', $request->fecha_hasta);

                if ($request->fecha_hasta && $request->fecha_desde)
                    $query = $query->whereBetween('fecha', [$request->fecha_desde, $request->fecha_hasta]);

                $data['registros'] = $query->get();
                return view('informes.movimientos.academicos.planes-evaluaciones.print', $data);

                break;

            default:
                break;
        }
    }

    public function getPlanesAcademicos(Request $request)
    {
        return PlanAcademico::with('asignatura')->where('plan_curso_id', $request->plan_curso_id)->get();
    }
}
