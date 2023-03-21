<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clausula extends Model
{
    use HasFactory;

    protected $table = 'clausulas';

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
