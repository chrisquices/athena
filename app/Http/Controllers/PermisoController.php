<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AsistenciaOperativo;
use App\Models\Causa;
use App\Models\Contrato;
use App\Models\HorarioDetalle;
use App\Models\JustificativoOperativo;
use App\Models\Permiso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $data['contratos'] = Contrato::with('asignatura')
            ->where([
                ['estado', 'Activo'],
            ])
            ->get();

        return view('procesos.operativos.permisos.index', $data);
    }

    public function getPermisos(Request $request)
    {
        return Permiso::with('causa', 'asistencia_operativo')
            ->where('contrato_id', $request->id)
            ->get();
    }

    public function create()
    {
        $data['contratos'] = Contrato::with('asignatura')
            ->where([
                ['estado', 'Activo'],
            ])
            ->get();

        $data['causas'] = Causa::where('tipo', 'Permiso')->get();

        return view('procesos.operativos.permisos.create', $data);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'contrato_id' => [
                'required',
            ],
            'causa_id' => [
                'required',
            ],
            'observacion' => [
                'required',
            ],
            'horario' => [
                'required',
            ],
        ]);

        $now = Carbon::now();

        if ($request->fecha > $now) {
            foreach ($request->horario as $key => $horario)
            {
                $exists = AsistenciaOperativo::where([
                    ['contrato_id', $request->contrato_id],
                    ['horario_detalle_id', $key],
                    ['fecha', $request->fecha]
                ])->first();

                if (!$exists) {
                    $asistencia_operativo = new AsistenciaOperativo;

                    $asistencia_operativo->contrato_id = $request->contrato_id;
                    $asistencia_operativo->horario_detalle_id = $key;
                    $asistencia_operativo->fecha = $request->fecha;
                    $asistencia_operativo->estado = 'Presente';

                    $asistencia_operativo->save();

                    AppHelper::instance()->logUserActivity('asistencias_operativo', 'creacion');

                    $permiso = new Permiso;

                    $permiso->asistencia_operativo_id = $asistencia_operativo->id;
                    $permiso->contrato_id = $request->contrato_id;
                    $permiso->causa_id = $request->causa_id;
                    $permiso->observacion = $request->observacion;

                    $permiso->save();

                    AppHelper::instance()->logUserActivity('permisos', 'creacion');

                } else {
                    return back()->with('useddate', 'useddate');
                }
            }
        } else {
            return back()->with('baddate', 'baddate');
        }

        return redirect('procesos/operativos/permisos')->with('success', 'success');
    }


    public function getHorarios(Request $request)
    {
        $today = Carbon::parse($request->fecha)->format('l');

        switch ($today) {
            case ('Monday'):
                $today = 'Lunes';
                break;

            case ('Tuesday'):
                $today = 'Martes';
                break;

            case ('Wednesday'):
                $today = 'Miercoles';
                break;

            case ('Thursday'):
                $today = 'Jueves';
                break;

            case ('Friday'):
                $today = 'Viernes';
                break;

            case ('Saturday'):
                $today = 'Sabado';
                break;

            case ('Sunday'):
                $today = 'Domingo';
                break;
        }

        return HorarioDetalle::with(
            'horario.plan_curso.grado',
            'horario.plan_curso.sede',
            'horario.plan_curso.malla_curricular.bachillerato',
            'asignatura'
        )
            ->where('contrato_id', $request->id)
            ->whereHas('horario', function ($query) use ($today) {
                $query->where('dia', $today);
            })
//            ->whereNotIn('id', AsistenciaOperativo::where('contrato_id', $request->id)->pluck('horario_detalle_id')->toArray())
            ->get()
            ->toArray();
    }

    public function show(Permiso $permiso)
    {
        return view('procesos.operativos.permisos.show', compact('permiso'));
    }

    public function anull(Permiso $permiso)
    {
								$someDate = new \DateTime($permiso->created_at);
								$now = new \DateTime();

								if($someDate->diff($now)->days > 30) {
												return redirect('procesos/operativos/permisos')->with('nopuedeanular', 'success');
								}

        $permiso->estado = 'Anulado';

        $permiso->save();

        AppHelper::instance()->logUserActivity('permisos', 'actualizacion');

        $asistencia_operativo = AsistenciaOperativo::find($permiso->asistencia_operativo_id);

        $asistencia_operativo->estado = 'Ausente';

        $asistencia_operativo->save();

        AppHelper::instance()->logUserActivity('asistencias_operativo', 'actualizacion');

        return redirect('procesos/operativos/permisos')->with('success', 'success');
    }
}
