<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $guarded = [];

    public function plan_curso()
    {
        return $this->belongsTo(PlanCurso::class);
    }

    public function bachillerato()
    {
        return $this->belongsTo(Bachillerato::class);
    }
}
