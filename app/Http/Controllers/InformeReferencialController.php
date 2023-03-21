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
use App\Models\MallaCurricular;
use App\Models\Nacionalidad;
use App\Models\Requisito;
use App\Models\Sede;
use App\Models\TipoEvaluacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformeReferencialController extends Controller
{
    public function areas()
    {
        $data['tabla_nombre'] = 'Areas';

        return view('informes.referenciales.areas.index', $data);
    }

    public function asignaturas()
    {
        $data['tabla_nombre'] = 'Asignaturas';
        $data['areas'] = Area::all();

        return view('informes.referenciales.asignaturas.index', $data);
    }

    public function bachilleratos()
    {
        $data['tabla_nombre'] = 'Bachilleratos';

        return view('informes.referenciales.bachilleratos.index', $data);
    }

    public function grados()
    {
        $data['tabla_nombre'] = 'Grados';

        return view('informes.referenciales.grados.index', $data);
    }

    public function requisitos()
    {
        $data['tabla_nombre'] = 'Requisitos';

        return view('informes.referenciales.requisitos.index', $data);
    }

    public function tiposEvaluaciones()
    {
        $data['tabla_nombre'] = 'Tipos de Evaluaciones';

        return view('informes.referenciales.tipos-evaluaciones.index', $data);
    }

    public function ciudades()
    {
        $data['tabla_nombre'] = 'Ciudades';

        return view('informes.referenciales.ciudades.index', $data);
    }

    public function clausulas()
    {
        $data['tabla_nombre'] = 'Clausulas';

        return view('informes.referenciales.clausulas.index', $data);
    }

    public function causas()
    {
        $data['tabla_nombre'] = 'Causas';

        return view('informes.referenciales.causas.index', $data);
    }

    public function nacionalidades()
    {
        $data['tabla_nombre'] = 'Nacionalidades';

        return view('informes.referenciales.nacionalidades.index', $data);
    }

    public function estudiantes()
    {
        $data['tabla_nombre'] = 'Estudiantes';
        $data['guardianes'] = Guardian::all();
        $data['nacionalidades'] = Nacionalidad::all();

        return view('informes.referenciales.estudiantes.index', $data);
    }

    public function guardianes()
    {
        $data['tabla_nombre'] = 'Guardianes';
        $data['ciudades'] = Ciudad::all();

        return view('informes.referenciales.guardianes.index', $data);
    }

    public function sedes()
    {
        $data['tabla_nombre'] = 'Sedes';

        return view('informes.referenciales.sedes.index', $data);
    }

    public function usuarios()
    {
        $data['tabla_nombre'] = 'Usuarios';

        return view('informes.referenciales.usuarios.index', $data);
    }



    public function print(Request $request)
    {
        $data['tabla'] = $request->tabla;
        $data['columnas'] = $request->columnas;
								$data['size'] = $request->size;
								$data['orientation'] = $request->orientation;

        switch ($data['tabla']) {
            case 'areas':
                $query = Area::query();
                break;

            case 'asignaturas':
                $query = Asignatura::query();
                break;

            case 'bachilleratos':
                $query = Bachillerato::query();
                break;

            case 'grados':
                $query = Grado::query();
                break;

            case 'requisitos':
                $query = Requisito::query();
                break;

            case 'tipos_evaluaciones':
                $query = TipoEvaluacion::query();
                break;

            case 'ciudades':
                $query = Ciudad::query();
                break;

            case 'clausulas':
                $query = Clausula::query();
                break;

            case 'causas':
                $query = Causa::query();
                break;

            case 'nacionalidades':
                $query = Nacionalidad::query();
                break;

            case 'estudiantes':
                $query = Estudiante::query();
                break;

            case 'guardianes':
                $query = Guardian::query();
                break;

            case 'sedes':
                $query = Sede::query();
                break;

            case 'users':
                $query = User::query();
                break;

            default:
                # code...
                break;
        }

        if ($request->area_id)
            $query = $query->where('area_id', $request->area_id);

        if ($request->guardian_id)
            $query = $query->where('guardian_id', $request->guardian_id);

        if ($request->ciudad_id)
            $query = $query->where('ciudad_id', $request->ciudad_id);

        if ($request->nacionalidad_id)
            $query = $query->where('nacionalidad_id', $request->nacionalidad_id);

        if ($request->role)
            $query = $query->where('role', $request->role);

        if ($request->verified)
            $query = $query->where('verified', $request->verified);

        if ($request->documento_tipo)
            $query = $query->where('documento_tipo', $request->documento_tipo);

        if ($request->sexo)
            $query = $query->where('sexo', $request->sexo);

        $data['registros'] = $query->get();

        return view('informes.referenciales.print', $data);
    }
}
