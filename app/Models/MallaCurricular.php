<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MallaCurricular extends Model
{
    use HasFactory;

    protected $table = 'mallas_curriculares';

    protected $guarded = [];

    public function bachillerato()
    {
        return $this->belongsTo(Bachillerato::class);
    }

				public function planes_cursos()
				{
								return $this->hasMany(PlanCurso::class);
				}

				public function asignaturas_mallas_curriculares()
				{
								return $this->hasMany(AsignaturaMallaCurricular::class);
				}
}
