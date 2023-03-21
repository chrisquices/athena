<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDetalle extends Model
{
    use HasFactory;

    protected $table = 'horarios_detalle';

    protected $guarded = [];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function asistencia_operativo()
    {
        return $this->hasMany(AsistenciaOperativo::class);
    }
}
