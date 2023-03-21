<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PlanCurso extends Model
{
    use HasFactory;

    protected $table = 'planes_cursos';

    protected $guarded = [];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function malla_curricular()
    {
        return $this->belongsTo(MallaCurricular::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class);
    }

				public function plan_diario()
				{
								return $this->hasMany(PlanDiario::class);
				}

				protected static function booted()
				{
								static::addGlobalScope('ancient', function (Builder $builder) {
												$builder->where('sede_id', session('sede_id'));
								});
				}
}
