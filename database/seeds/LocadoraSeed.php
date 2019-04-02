<?php

use Illuminate\Database\Seeder;

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
    }
}
