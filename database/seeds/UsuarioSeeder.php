<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('usuarios')->insert(
            array(
                [
                    'id_pessoa'=>1,
                    'email'=>"tarcisotc@gmail.com",
                    'acesso'=>"user",
                    'palavra_passe'=>md5("tarcisotc"),
                    'estado'=>"on",
                ],[
                    'id_pessoa'=>2,
                    'email'=>"arafate@gmail.com",
                    'acesso'=>"admin",
                    'palavra_passe'=>md5("arafate"),
                    'estado'=>"on",
                ],
            )
        );
    }
}