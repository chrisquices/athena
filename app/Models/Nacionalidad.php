<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidades';

    protected $guarded = [];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
