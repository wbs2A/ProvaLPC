<?php

use Illuminate\Database\Seeder;

class AcessorioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('acessorio')->insert(
         	array(
         		array('nome'=> 'Ar-condicionado'), //1
         		array('nome'=> 'Trava elétrica'), //2
         		array('nome'=> 'Vidro elétrico'), //3
         		array('nome'=> 'Air bag'), //4
         		array('nome'=> 'ABS'), //5
         		array('nome'=> '2 mala(s) grande(s)'), //6
         		array('nome'=> '1 mala(s) pequena(s)'), //7
         		array('nome'=> '1 mala(s) grande(s)'), //8
         		array('nome'=> '2 mala(s) pequena(s)'), //9
         		array('nome'=> 'Automático'), //10
         		array('nome'=> '3 mala(s) grande(s)'), //11
         		array('nome'=> 'Banco de Couro'), //12
         		array('nome'=> '3 mala(s) grande(s)'), //13
         		array('nome' => 'CD Player USB'), //14
         		array('nome' => '2 portas'), //15
         		array('nome' => '4 portas') //16
         	)
         );
    }
}
