<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [
        'id_pessoa',
        'bairro',
        'telefone',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function reserva(){
        return $this->hasMany(Reserva::class, 'id_cliente', 'id');
    }
}