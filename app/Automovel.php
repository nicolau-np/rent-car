<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = "automovels";
    protected $fillable = [
        'marca',
        'modelo',
        'cilindragem',
        'matricula',
        'foto',
        'preco',
        'tipo',
        'estado',
    ];

    public function reserva(){
        return $this->hasMany(Reserva::class, 'id_automovel', 'id');
    }
}