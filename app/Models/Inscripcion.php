<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $guarded = [];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function plan_curso()
    {
        return $this->belongsTo(PlanCurso::class);
    }
}
