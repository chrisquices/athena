<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grados';

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
