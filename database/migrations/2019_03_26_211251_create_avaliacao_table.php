<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvaliacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avaliacao', function(Blueprint $table)
		{
			$table->integer('idavaliacao');
			$table->string('avaliacao', 45)->nullable();
			$table->integer('carros_idcarro');
			$table->integer('carros_locadora_idLocadora');
			$table->boolean('tipoAvaliacao')->nullable();
			$table->string('pessoaFisica_idpessoaFisica', 13)->index('fk_avaliacao_pessoaFisica1_idx');
			$table->primary(['idavaliacao']);
			$table->index(['carros_idcarro','carros_locadora_idLocadora'], 'fk_avaliacao_carros1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('avaliacao');
	}

}
