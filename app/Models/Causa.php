<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causa extends Model
{
    use HasFactory;

    protected $table = 'causas';

    protected $guarded = [];

    // public function justificationStudent()
    // {
    //     return $this->hasMany(JustificationStudent::class);
    // }

    // public function sanctionStudent()
    // {
    //     return $this->hasMany(SanctionStudent::class);
    // }

    // public function desertionStudent()
    // {
    //     return $this->hasMany(DesertionStudent::class);
    // }
}
