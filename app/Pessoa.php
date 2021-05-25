<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";
    protected $fillable = [
        'nome',
        'sobrenome',
        'foto',
        'estado',
    ];

    public function cliente()
    {
        return $this->hasMany(Cliente::class, 'id_pessoa', 'id');
    }

    public function usuario(){
        return $this->hasMany(User::class, 'id_pessoa', 'id');
    }
}