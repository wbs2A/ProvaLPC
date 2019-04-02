<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarroSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carros')->insert(
        	array(
        		array('placa' =>'HMG-0248', 'valor'=> 366.62, 'locadora_idLocadora'=> 1, 'nome' => 'Mobi', 'modelo' =>'Mobi', 'marca' => 'Fiat', 'direcao' => 'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 1 ),
         		array('placa' =>'LPT-4625', 'valor'=> 386.62, 'locadora_idLocadora'=> 1, 'nome' => 'Renault Logan', 'modelo' => 'Logan', 'marca' => 'Logan', 'direcao' => 'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 2)
        	)
        );
         DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 9),
         		array('carros_idcarro' => 1, 'acessorio_idacessorio' => 15)
         	)
         );
		DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 6),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 9),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 16)
         	)
         );
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' => 'Fiat Argo 1.0', 'modelo' => 'Argo 1.0', 'marca' => 'Fiat', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' =>3),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
        	// 	array('placa' =>, 'valor'=>, 'locadora_idLocadora'=> 1, 'nome' =>, 'modelo' =>, 'marca' =, 'direcao' =>, 'cambio' =>, 'passageiros' => , 'idClassificacao' =>),
         /*

         */
    }
}
