<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionPlanEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones_planes_evaluaciones';

    protected $guarded = [];

    public function plan_evaluacion()
    {
        return $this->belongsTo(PlanEvaluacion::class);
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
