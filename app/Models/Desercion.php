<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desercion extends Model
{
    use HasFactory;

    protected $table = 'deserciones';

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
