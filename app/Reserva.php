<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";

    protected $fillable = [
        'id_cliente',
        'id_automovel',
        'data_requisicao',
        'hora_requisicao',
        'local_receber',
        'estado',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function automovel(){
        return $this->belongsTo(Automovel::class, 'id_automovel', 'id');
    }
}