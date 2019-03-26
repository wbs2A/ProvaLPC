<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHabilitacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('habilitacao', function(Blueprint $table)
		{
			$table->integer('idhabilitacao');
			$table->string('nCNH', 45)->nullable();
			$table->string('nRegistro', 45)->nullable();
			$table->date('dataValidade')->nullable();
			$table->integer('Estado_idEstado')->index('fk_habilitacao_Estado1_idx');
			$table->string('pessoaFisica_idpessoaFisica', 13)->index('fk_habilitacao_pessoaFisica1_idx');
			$table->primary('idhabilitacao');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('habilitacao');
	}

}
