<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDiarioDetalle extends Model
{
    use HasFactory;

    protected $table = 'planes_diarios_detalles';

    protected $guarded = [];

				public function plan_diario()
				{
								return $this->belongsTo(PlanDiario::class);
				}
}
