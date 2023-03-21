<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'planes_evaluaciones';

    protected $guarded = [];

				public function tipo_evaluacion()
				{
								return $this->belongsTo(TipoEvaluacion::class);
				}

				public function inscripciones_planes_evaluaciones()
				{
								return $this->hasMany(InscripcionPlanEvaluacion::class);
				}

				public function plan_academico()
				{
								return $this->belongsTo(PlanAcademico::class);
				}

				public function plan_curso()
				{
								return $this->belongsTo(PlanCurso::class);
				}
}
