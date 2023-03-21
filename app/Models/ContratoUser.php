<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoUser extends Model
{
    use HasFactory;

    protected $table = 'contratos_users';

    protected $guarded = [];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
