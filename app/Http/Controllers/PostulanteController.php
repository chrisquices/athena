<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Area;
use App\Models\Asignatura;
use App\Models\AsignaturaMallaCurricular;
use App\Models\AsignaturaPostulante;
use App\Models\Bachillerato;
use App\Models\Ciudad;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Guardian;
use App\Models\Postulante;
use Illuminate\Http\Request;
use App\Models\MallaCurricular;
use App\Models\PlanCurso;
use App\Models\Sede;
use Illuminate\Validation\Rule;

class PostulanteController extends Controller
{
    public function index()
    {
        $data['postulantes'] = Postulante::all();

        return view('procesos.operativos.postulantes.index', $data);
    }

    public function create()
    {
        $data['ciudades'] = Ciudad::all();
        $data['asignaturas'] = Asignatura::all();

        return view('procesos.operativos.postulantes.create', $data);
    }

    public function store(Request $request, Postulante $postulante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
            ],
            'apellido' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
            'ciudad_id' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('postulantes', 'id')->ignore($postulante)
            ],
            'asignatura_id' => [
                'required',
            ],
        ]);

        $postulante->nombre = $request->nombre;
        $postulante->apellido = $request->apellido;
        $postulante->telefono = $request->telefono;
        $postulante->ciudad_id = $request->ciudad_id;
        $postulante->direccion = $request->direccion;
        $postulante->documento_tipo = $request->documento_tipo;
        $postulante->documento_numero = $request->documento_numero;

        $postulante->save();

        $this->storeDetalle($postulante->id, $request->asignatura_id);

        AppHelper::instance()->logUserActivity('postulantes', 'creacion');

        return redirect('procesos/operativos/postulantes')->with('success', 'success');
    }

    public function storeDetalle($postulante_id, $asignatura_id) {
        foreach ($asignatura_id as $value) {
            $asignatura_postulante = new AsignaturaPostulante();

            $asignatura_postulante->asignatura_id = $value;
            $asignatura_postulante->postulante_id = $postulante_id;

            $asignatura_postulante->save();

            AppHelper::instance()->logUserActivity('asignaturas_postulantes', 'creacion');
        }
    }

    public function show(Postulante $postulante)
    {
        $data['postulante'] = $postulante;

        return view('procesos.operativos.postulantes.show', $data);
    }

    public function edit(Postulante $postulante)
    {
        $data['postulante'] = $postulante;
        $data['ciudades'] = Ciudad::all();
        $data['asignaturas'] = Asignatura::all();
        $data['asignaturas_checked'] = AsignaturaPostulante::where('postulante_id', $postulante->id)->pluck('asignatura_id')->toArray();

        foreach ($data['asignaturas'] as $asignatura) {
            if (in_array($asignatura->id, $data['asignaturas_checked'])) {
                $asignatura['checked'] = true;
            }
        }

        return view('procesos.operativos.postulantes.edit', $data);
    }

    public function update(Request $request, Postulante $postulante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
            ],
            'apellido' => [
                'required',
            ],
            'telefono' => [
                'required',
            ],
            'ciudad_id' => [
                'required',
            ],
            'direccion' => [
                'required',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('postulantes', 'id')->ignore($postulante)
            ],
            'asignatura_id' => [
                'required',
            ],
        ]);

        $postulante->nombre = $request->nombre;
        $postulante->apellido = $request->apellido;
        $postulante->telefono = $request->telefono;
        $postulante->ciudad_id = $request->ciudad_id;
        $postulante->direccion = $request->direccion;
        $postulante->documento_tipo = $request->documento_tipo;
        $postulante->documento_numero = $request->documento_numero;

        $postulante->save();


        $this->updateDetalle($postulante->id, $request->asignatura_id);

        AppHelper::instance()->logUserActivity('postulantes', 'actualizacion');

        return redirect('procesos/operativos/postulantes')->with('success', 'success');
    }

    public function updateDetalle($postulante_id, $asignatura_id) {
        $eliminar = AsignaturaPostulante::where('postulante_id', $postulante_id)->delete();

        foreach ($asignatura_id as $value) {
            $asignatura_postulante = new AsignaturaPostulante();

            $asignatura_postulante->asignatura_id = $value;
            $asignatura_postulante->postulante_id = $postulante_id;

            $asignatura_postulante->save();

            AppHelper::instance()->logUserActivity('asignaturas_postulantes', 'actualizacion');
        }
    }

    public function anull(PlanCurso $plan_curso)
    {
        try {
            $plan_curso->estado = 'Anulado';

            $plan_curso->save();

            AppHelper::instance()->logUserActivity('planes_cursos', 'anulacion');

            return redirect('procesos/operativos/postulantes')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/operativos/postulantes')->with('error', 'error');
        }
    }
}
