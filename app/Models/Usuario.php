<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario',
        'email',
        'senha'
    ];

    public function postagems() {
        return $this->hasMany(Postagem::class);
    }
}
