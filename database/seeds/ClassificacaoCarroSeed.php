<?php

use Illuminate\Database\Seeder;

class ClassificacaoCarroSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('classificacaoCarro')->insert(
         	array(
         		array('tipo' =>'ECONÔMICO'),
         		array('tipo' => 'INTERMEDIÁRIO'), 
                array('tipo' => 'STANDARD'), 
                array('tipo' => 'COMPACTO'), 
                array('tipo' => 'SUV'), 
         		array('tipo' => 'UTILITÁRIO'), 
                array('tipo' => 'PRIMEIUM'), 
                array('tipo' => 'MINIVAN'), 
                array('tipo' => 'ESPECIAL'), 
         		array('tipo' => 'lUXO')
         	)
         );
    }
}
