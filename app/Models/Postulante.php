<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $table = 'postulantes';

    protected $guarded = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function asignatura_postulante()
    {
        return $this->hasMany(AsignaturaPostulante::class);
    }
}
