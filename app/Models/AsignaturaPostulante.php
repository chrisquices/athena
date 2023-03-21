<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaturaPostulante extends Model
{
    use HasFactory;

    protected $table = 'asignaturas_postulantes';

    protected $guarded = [];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function postulante()
    {
        return $this->belongsTo(Postulante::class);
    }
}
