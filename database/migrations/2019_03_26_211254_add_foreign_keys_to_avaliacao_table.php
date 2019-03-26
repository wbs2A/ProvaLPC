<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAvaliacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('avaliacao', function(Blueprint $table)
		{
			$table->foreign('carros_idcarro', 'fk_avaliacao_carros1')->references('idcarro')->on('carros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pessoaFisica_idpessoaFisica', 'fk_avaliacao_pessoaFisica1')->references('idpessoaFisica')->on('pessoafisica')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('avaliacao', function(Blueprint $table)
		{
			$table->dropForeign('fk_avaliacao_carros1');
			$table->dropForeign('fk_avaliacao_pessoaFisica1');
		});
	}

}
