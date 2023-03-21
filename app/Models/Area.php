<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $guarded = [];
    /**
     * @var mixed
     */
    private $name;

    public function asignatura()
    {
        return $this->hasMany(Asignatura::class);
    }
}
