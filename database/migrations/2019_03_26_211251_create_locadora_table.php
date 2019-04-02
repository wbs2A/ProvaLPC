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
			$table->integer('idLocadora',true);
			$table->string('nome', 45);
			$table->integer('Endereco_idEndereco')->index('fk_locadora_Endereco1_idx');
			$table->string('tipoProtecao', 45)->nullable();
			$table->string('idadeMediaFrota', 45)->nullable();
			$table->string('horarioAtendimento', 45)->nullable();
			$table->string('pessoaJuridica_idPJ', 16)->index('fk_locadora_pessoaJuridica1_idx');
			DB::table('locadora')->raw('ALTER TABLE  `acessorio` ADD idLocadora INT PRIMARY KEY AUTO_INCREMENT;');
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
