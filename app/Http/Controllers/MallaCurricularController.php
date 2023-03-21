<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\Bachillerato;
use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\MallaCurricular;
use Auth;
use DB;

class MallaCurricularController extends Controller
{
    public function index()
    {
        $mallas_curriculares = MallaCurricular::where('ano', date('Y'))->orderBy('nombre')->get();

        return view('procesos.academicos.mallas-curriculares.index', compact('mallas_curriculares'));
    }

    public function create()
    {
        $bachilleratos = Bachillerato::all();
        $grados = Grado::all();
        $areas = Area::all();

        return view('procesos.academicos.mallas-curriculares.create', compact('bachilleratos', 'grados', 'areas'));
    }

    public function show(MallaCurricular $malla_curricular)
    {
        $malla_curricular_detalle = AsignaturaMallaCurricular::where('malla_curricular_id', $malla_curricular->id)->get();

        return view('procesos.academicos.mallas-curriculares.show', compact('malla_curricular', 'malla_curricular_detalle'));
    }

    public function print(MallaCurricular $malla_curricular)
    {
        $malla_curricular_detalle = AsignaturaMallaCurricular::where('malla_curricular_id', $malla_curricular->id)->orderBy('plan')->get();
        $grados_ids = AsignaturaMallaCurricular::select('grado_id')->where('malla_curricular_id', $malla_curricular->id)->distinct()->get();
        $grados_ids_filtered = [];

        foreach ($grados_ids as $key => $grado_id) {
            $grados_ids_filtered[] = $grado_id->grado_id;
        }

        $grados = Grado::find($grados_ids_filtered);

        $areas = Area::all();

        AppHelper::instance()->logUserActivity('mallas_curriculares', 'generacion');

        return view('procesos.academicos.mallas-curriculares.print', compact('malla_curricular', 'malla_curricular_detalle', 'areas', 'grados'));
    }

    public function reloadTable(Request $request)
    {
        return MallaCurricular::where('ano', $request->ano)->orderBy('nombre')->get();
    }

    public function store(Request $request, MallaCurricular $malla_curricular)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'ano' => [
                'required',
            ],
            'data' => [
                'required',
            ],
        ]);

        $malla_curricular->nombre = $request->nombre;
        $malla_curricular->bachillerato_id = $request->bachillerato_id;
        $malla_curricular->ano = $request->ano;

        $malla_curricular->save();

        AppHelper::instance()->logUserActivity('mallas_curriculares', 'creacion');

        $this->storeStep2($malla_curricular->id, $request->data);

        return redirect('procesos/academicos/mallas-curriculares')->with('success', 'success');
    }

    public function storeStep2($malla_curricular_id, $data)
    {
        foreach ($data as $key => $value) {
            DB::table('asignaturas_mallas')->insert([
                'asignatura_id' => $value['asignatura_id'],
                'malla_curricular_id' => $malla_curricular_id,
                'grado_id' => $value['grado_id'],
                'plan' => $value['plan'],
                'horas_catedras' => $value['horas_catedras'],
            ]);

            AppHelper::instance()->logUserActivity('asignaturas_mallas_curriculares', 'creacion');
        }
    }

    public function anull(MallaCurricular $malla_curricular)
    {
        try {
												$someDate = new \DateTime($malla_curricular->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/academicos/mallas-curriculares')->with('nopuedeanular', 'success');
												}

												$planes_cursos = count($malla_curricular->planes_cursos);

												if ($planes_cursos !== 0) {
																return redirect('procesos/academicos/mallas-curriculares')->with('relations', 'error');
												}

            $malla_curricular->estado = 'Anulado';

            $malla_curricular->save();

            AppHelper::instance()->logUserActivity('mallas_curriculares', 'anulacion');

            return redirect('procesos/academicos/mallas-curriculares')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/academicos/mallas-curriculares')->with('error', 'error');
        }
    }
}
