<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = 'asignaturas';

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function asignatura_malla_curricular()
    {
        return $this->hasMany(AsignaturaMallaCurricular::class);
    }
}
