<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'conteudo',
        'grupo_id',
        'autor_id'
    ];

    public function grupos() {
        return $this->belongsTo(Grupo::class);
    }

    public function usuarios() {
        return $this->belongsTo(Usuario::class);
    }
}
