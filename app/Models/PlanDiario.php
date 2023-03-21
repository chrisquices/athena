<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDiario extends Model
{
    use HasFactory;

    protected $table = 'planes_diarios';

    protected $guarded = [];

				public function plan_curso()
				{
								return $this->belongsTo(PlanCurso::class);
				}

				public function contrato()
				{
								return $this->belongsTo(Contrato::class);
				}

				public function plan_diario_detalle()
				{
								return $this->hasMany(PlanDiarioDetalle::class);
				}
}
