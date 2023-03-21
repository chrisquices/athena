<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JustificativoOperativo extends Model
{
    use HasFactory;

    protected $table = 'justificativos_operativo';

    protected $guarded = [];

    public function asistencia_operativo()
    {
        return $this->belongsTo(AsistenciaOperativo::class);
    }

    public function causa()
    {
        return $this->belongsTo(Causa::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
