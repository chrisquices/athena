<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $table = 'requisitos';

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}