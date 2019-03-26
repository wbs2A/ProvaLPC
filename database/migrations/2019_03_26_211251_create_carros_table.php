<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros', function(Blueprint $table)
		{
			$table->integer('idcarro');
			$table->string('placa', 45)->nullable();
			$table->float('valor', 10, 0)->nullable();
			$table->string('locado', 45)->nullable();
			$table->integer('locadora_idLocadora')->index('fk_carros_locadora1_idx');
			$table->string('nome', 45)->nullable();
			$table->string('modelo', 45)->nullable();
			$table->string('marca', 45)->nullable();
			$table->string('direcao', 45)->nullable();
			$table->string('cambio', 45)->nullable();
			$table->integer('passageiros')->nullable();
			$table->integer('idClassificacao')->index('fk_carros_classificacaoCarro1_idx');
			$table->primary('idcarro');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros');
	}

}
