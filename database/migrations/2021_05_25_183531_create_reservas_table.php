<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cliente')->unsigned()->index();
            $table->bigInteger('id_automovel')->unsigned()->index();
            $table->date('data_requisicao');
            $table->string('hora_requisicao');
            $table->string('local_receber');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('reservas', function (Blueprint $table) {
            $table->foreign('id_cliente')->references('id')->on('clientes')->onUpdate('cascade');
            $table->foreign('id_automovel')->references('id')->on('automovels')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}