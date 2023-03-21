<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JustificativoDocumental extends Model
{
    use HasFactory;

    protected $table = 'justificativos_documental';

    protected $guarded = [];

    public function asistencia_documental()
    {
        return $this->belongsTo(AsistenciaDocumental::class);
    }

    public function causa()
    {
        return $this->belongsTo(Causa::class);
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
