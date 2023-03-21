<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Inscripcion;
use App\Models\PlanCurso;

class InscripcionController extends Controller
{
    public function index()
    {
        $data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

        return view('procesos.documentales.inscripciones.index', $data);
    }

    public function getInscripciones(Request $request)
    {
        return Inscripcion::with('estudiante')->where('plan_curso_id', $request->id)->get();
    }

    public function create()
    {
        $data['planes_cursos'] = PlanCurso::where('estado', 'Activo')->get();

        $data['estudiantes'] = Estudiante::whereNotIn('id', function($query) {
                $query->select('estudiante_id')->from('inscripciones')->get()->toArray();
            })->get();

        return view('procesos.documentales.inscripciones.create', $data);
    }

    public function show(Inscripcion $inscripcion)
    {
        return view('procesos.documentales.inscripciones.show', compact('inscripcion'));
    }

    public function edit(Inscripcion $inscripcion)
    {
        return view('procesos.documentales.inscripciones.edit', compact('inscripcion'));
    }

    public function store(Request $request, Inscripcion $inscripcion)
    {
        $validator = $request->validate([
            'plan_curso_id' => [
                'required',
            ],
            'estudiante_id' => [
                'required',
            ],
            'procedencia' => [
                'required',
            ],
        ]);

        $inscripcion->plan_curso_id = $request->plan_curso_id;
        $inscripcion->estudiante_id = $request->estudiante_id;
        $inscripcion->procedencia = $request->procedencia;
        $inscripcion->repitente = ($request->repitente) ? true : false;
        $inscripcion->traslado = ($request->traslado) ? true : false;
        $inscripcion->libreta_calificacion = ($request->libreta_calificacion) ? true : false;
        $inscripcion->certificado_estudio = ($request->certificado_estudio) ? true : false;
        $inscripcion->partida_nacimiento = ($request->partida_nacimiento) ? true : false;
        $inscripcion->foto = ($request->foto) ? true : false;
        $inscripcion->ficha = ($request->ficha) ? true : false;

        $inscripcion->save();

        return redirect('procesos/documentales/inscripciones')->with('success', 'success');
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $inscripcion->procedencia = $request->procedencia;
        $inscripcion->repitente = ($request->repitente) ? true : false;
        $inscripcion->traslado = ($request->traslado) ? true : false;
        $inscripcion->libreta_calificacion = ($request->libreta_calificacion) ? true : false;
        $inscripcion->certificado_estudio = ($request->certificado_estudio) ? true : false;
        $inscripcion->partida_nacimiento = ($request->partida_nacimiento) ? true : false;
        $inscripcion->foto = ($request->foto) ? true : false;
        $inscripcion->ficha = ($request->ficha) ? true : false;

        $inscripcion->save();

        return redirect('procesos/documentales/inscripciones')->with('success', 'success');
    }

    public function anull(Inscripcion $inscripcion)
    {
        try {
												$someDate = new \DateTime($inscripcion->created_at);
												$now = new \DateTime();

												if($someDate->diff($now)->days > 30) {
																return redirect('procesos/documentales/inscripciones')->with('nopuedeanular', 'success');
												}

            $inscripcion->estado = 'Anulado';

            $inscripcion->save();

            return redirect('procesos/documentales/inscripciones')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('procesos/documentales/inscripciones')->with('error', 'error');
        }
    }

    public function print(Inscripcion $inscripcion)
    {
        return view('procesos.documentales.inscripciones.print', compact('inscripcion'));
    }
}
