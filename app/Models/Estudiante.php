<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $guarded = [];

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
