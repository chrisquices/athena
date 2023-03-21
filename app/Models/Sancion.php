<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    use HasFactory;

    protected $table = 'sanciones';

    protected $guarded = [];

    public function causa()
    {
        return $this->belongsTo(Causa::class);
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
