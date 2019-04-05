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
        		array('placa' =>'HMG-0248', 'valor'=> 584.62, 'locadora_idLocadora'=> 1, 'nome' => 'Mobi', 'modelo' =>'Mobi', 'marca' => 'Fiat', 'direcao' => 'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 1 ),
         		array('placa' =>'LPT-4625', 'valor'=> 732.62, 'locadora_idLocadora'=> 1, 'nome' => 'Renault Logan', 'modelo' => 'Logan', 'marca' => 'Logan', 'direcao' => 'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 2),
         		array('placa' =>'JJK-1960', 'valor'=>771.90, 'locadora_idLocadora'=> 1, 'nome' => 'Fiat Argo 1.0', 'modelo' => 'Argo 1.0', 'marca' => 'Fiat', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' =>3),
         		array('placa' =>'WQA-3467', 'valor'=> 799.23, 'locadora_idLocadora'=> 1, 'nome' => 'Volkswagen Voyage', 'modelo' =>'Voyage', 'marca' =>'Volkswagen', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 4),
         		array('placa' =>'CLW-6745', 'valor'=> 799.12, 'locadora_idLocadora'=> 1, 'nome' => 'Hyundai HB20', 'modelo' =>'HB20', 'marca' =>'HB20', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 5),
         		array('placa' =>'KLR-7465', 'valor'=> 1018.79, 'locadora_idLocadora'=> 1, 'nome' => 'Renault Duster', 'modelo' =>'Duster', 'marca' =>'Renault', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' => 6)
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
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 9),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 2, 'acessorio_idacessorio' => 16)
         	)
         );
		DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 9),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 3, 'acessorio_idacessorio' => 16)
         	)
         );
		DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 9),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 4, 'acessorio_idacessorio' => 16)
         	)
         );
		DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 7),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 5, 'acessorio_idacessorio' => 16)
         	)
         );
		DB::table('carros_acessorio')->insert(
         	array(
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 1),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 2),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 3),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 4),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 5),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 6),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 14),
         		array('carros_idcarro' => 6, 'acessorio_idacessorio' => 16)
         	)
         );
		DB::table('imagens')->insert(array(
		    array('caminho'=>'images/cars/mobi1.png'),
            array('caminho'=>'images/cars/mobi2.png'),
            array('caminho'=>'images/cars/mobi3.png'),
            array('caminho'=>'images/cars/logan1.jpg'),
            array('caminho'=>'images/cars/logan2.jpg'),
            array('caminho'=>'images/cars/logan3.jpg')
        ));
		DB::table('carros_has_imagens')->insert(array(
            array('carros_idcarro'=>1, 'imagens_idimagens'=>1),
            array('carros_idcarro'=>1, 'imagens_idimagens'=>2),
            array('carros_idcarro'=>1, 'imagens_idimagens'=>3),
            array('carros_idcarro'=>2, 'imagens_idimagens'=>4),
            array('carros_idcarro'=>2, 'imagens_idimagens'=>5),
            array('carros_idcarro'=>2, 'imagens_idimagens'=>6)
        ));
        	// 	array('placa' =>'KLR-7465', 'valor'=> 1.018,79, 'locadora_idLocadora'=> 1, 'nome' => 'Renault Duster', 'modelo' =>'Duster', 'marca' =>'Renault', 'direcao' =>'Hidráulica', 'cambio' =>'Manual', 'passageiros' => 5, 'idClassificacao' =>6),
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
