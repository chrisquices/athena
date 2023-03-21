<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaDocumental extends Model
{
    use HasFactory;

    protected $table = 'asistencias_documental';

    protected $guarded = [];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public function plan_academico()
    {
        return $this->belongsTo(PlanAcademico::class);
    }
}
