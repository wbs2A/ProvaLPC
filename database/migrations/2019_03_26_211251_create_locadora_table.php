<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocadoraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locadora', function(Blueprint $table)
		{
			$table->integer('idLocadora');
			$table->string('nome', 45);
			$table->integer('Endereco_idEndereco')->index('fk_locadora_Endereco1_idx');
			$table->string('tipoProtecao', 45)->nullable();
			$table->string('idadeMediaFrota', 45)->nullable();
			$table->string('horarioAtendimento', 45)->nullable();
			$table->string('pessoaJuridica_idPJ', 16)->index('fk_locadora_pessoaJuridica1_idx');
			$table->primary(['idLocadora','pessoaJuridica_idPJ']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locadora');
	}

}
