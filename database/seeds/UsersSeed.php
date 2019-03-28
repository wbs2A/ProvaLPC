<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(array('name'=> 'Marcio Pança', 'email'=> 'marcio@mm.com', 'telefone'=> '67999998877', 'password'=>Hash::make("123456"), 'tipo'=> 0));
        DB::table('user')->insert(array('name'=> 'Empresa de Carro', 'email'=> 'empresa@em.com', 'telefone'=> '67999998877', 'password'=>Hash::make("123456"), 'tipo'=> 1));
        DB::table('pessoafisica')->insert(array('idpessoaFisica'=>'12345678911', 'Endereco_idEndereco'=> 1, 'user_iduser'=> 1, 'sexo'=> 'Abacaxi', 'rg'=> '388821528', 'dataNascimento'=>date('Y-m-d H:i:s', strtotime('2000-08-16 0:0:0'))));
        DB::table('pessoajuridica')->insert(array('idPJ'=>'123456789100002', 'razaoSocial'=>'LocadoraRealOficial', 'Endereco_idEndereco'=> 2, 'user_iduser'=> 2));
    }
}
