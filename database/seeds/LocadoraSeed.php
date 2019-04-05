<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocadoraSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locadora')->insert(array('nome'=> 'Luxo Car', 'pessoaJuridica_idPJ'=> '123456789100002', 'Endereco_idEndereco' => 3,	'tipoProtecao'=> 'qualquer um',	'idadeMediaFrota' => '2', 'horarioAtendimento' => 'Segunda a Sabado, 7h ás 19h'));
        DB::table('locadora')->insert(array('nome'=> 'Carros e Tia', 'pessoaJuridica_idPJ'=> '123456789100002', 'Endereco_idEndereco' => 4,	'tipoProtecao'=> 'Todos',	'idadeMediaFrota' => '1,5', 'horarioAtendimento' => 'Segunda a segunda, 7h ás 22h'));
    }
}
