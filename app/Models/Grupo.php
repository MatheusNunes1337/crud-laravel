<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'disciplina',
    ];

    public function postagems() {
        return $this->hasMany(Postagem::class);
    }
}
