<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaOperativo extends Model
{
    use HasFactory;

    protected $table = 'asistencias_operativo';

    protected $guarded = [];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

				public function horario_detalle()
				{
								return $this->belongsTo(HorarioDetalle::class);
				}

				public function reemplazante()
				{
								return $this->belongsTo(Reemplazante::class);
				}
}
