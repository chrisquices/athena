<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $guarded = [];

    public function asignatura()
    {
        return $this->belongsto(Asignatura::class);
    }

    public function postulante()
    {
        return $this->belongsto(Postulante::class);
    }

				public function user() {
								return $this->belongsTo(User::class);
				}
}
