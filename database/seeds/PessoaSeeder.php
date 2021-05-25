<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $pessoas = [
        [
            'nome'=>"Tarciso",
            'sobrenome'=>"TC",
            'foto'=>null,
            'estado'=>"on",
        ], [
            'nome'=>"Romeu",
            'sobrenome'=>"Arafate",
            'foto'=>null,
            'estado'=>"on",
        ],
    ];

    public function run()
    {
        foreach(Self::$pessoas as $pessoa){
            DB::table('pessoas')->insert(
                $pessoa
            );
        }
    }
}