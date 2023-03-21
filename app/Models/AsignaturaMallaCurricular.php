<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaturaMallaCurricular extends Model
{
    use HasFactory;

    protected $table = 'asignaturas_mallas';

    protected $guarded = [];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}
