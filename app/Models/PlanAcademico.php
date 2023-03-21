<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAcademico extends Model
{
    use HasFactory;

    protected $table = 'planes_academicos';

    protected $guarded = [];

    public function plan_curso()
    {
        return $this->belongsTo(PlanCurso::class);
    }

				public function asignatura()
				{
								return $this->belongsTo(Asignatura::class);
				}

				public function planes_evaluaciones()
				{
								return $this->hasMany(PlanEvaluacion::class);
				}
}
