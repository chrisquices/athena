<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table = 'guardianes';

    protected $guarded = [];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class);
    }
}
