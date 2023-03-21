<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    protected $guarded = [];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function causa()
    {
        return $this->belongsTo(Causa::class);
    }

    public function asistencia_operativo()
    {
        return $this->belongsTo(AsistenciaOperativo::class);
    }
}
