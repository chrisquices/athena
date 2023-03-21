<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoInscripcion extends Model
{
    use HasFactory;

    protected $table = 'requisitos_inscripciones';

    protected $guarded = [];

    public function plan_curso()
    {
        return $this->belongsTo(PlanCurso::class);
    }

    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}
