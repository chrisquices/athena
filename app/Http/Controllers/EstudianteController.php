<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Estudiante;
use App\Models\Nacionalidad;
use App\Models\Guardian;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('nombre')->get();

        return view('mantenimiento-seguridad.referenciales-documentales.estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $nacionalidades = Nacionalidad::all();
        $guardianes = Guardian::all();

        return view('mantenimiento-seguridad.referenciales-documentales.estudiantes.create', compact('nacionalidades', 'guardianes'));
    }

    public function show(Estudiante $estudiante)
    {
        return view('mantenimiento-seguridad.referenciales-documentales.estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $nacionalidades = Nacionalidad::all();
        $guardianes = Guardian::all();

        return view('mantenimiento-seguridad.referenciales-documentales.estudiantes.edit', compact('estudiante', 'nacionalidades', 'guardianes'));
    }

    public function store(Request $request, Estudiante $estudiante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'apellido' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('estudiantes')->ignore($estudiante)
            ],
            'nacionalidad_id' => [
                'required',
            ],
            'fecha_nacimiento' => [
                'required',
            ],
            'sexo' => [
                'required',
            ],
            'guardian_id' => [
                'required',
            ],
        ]);

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->documento_tipo = $request->documento_tipo;
        $estudiante->documento_numero = $request->documento_numero;
        $estudiante->nacionalidad_id = $request->nacionalidad_id;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->sexo = $request->sexo;
        $estudiante->guardian_id = $request->guardian_id;

        $estudiante->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/estudiantes')->with('success', 'success');
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $validator = $request->validate([
            'nombre' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'apellido' => [
                'required',
                'between:1,255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'documento_tipo' => [
                'required',
            ],
            'documento_numero' => [
                'required',
                Rule::unique('estudiantes')->ignore($estudiante)
            ],
            'nacionalidad_id' => [
                'required',
            ],
            'fecha_nacimiento' => [
                'required',
            ],
            'sexo' => [
                'required',
            ],
            'guardian_id' => [
                'required',
            ],
        ]);

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->documento_tipo = $request->documento_tipo;
        $estudiante->documento_numero = $request->documento_numero;
        $estudiante->nacionalidad_id = $request->nacionalidad_id;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->sexo = $request->sexo;
        $estudiante->guardian_id = $request->guardian_id;

        $estudiante->save();

        return redirect('mantenimiento-seguridad/referenciales-documentales/estudiantes')->with('success', 'success');
    }

    public function delete(Estudiante $estudiante)
    {
        try {
            $estudiante->delete();

            return redirect('mantenimiento-seguridad/referenciales-documentales/estudiantes')->with('success', 'success');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('mantenimiento-seguridad/referenciales-documentales/estudiantes')->with('error', 'error');
        }
    }
}
