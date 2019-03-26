<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLocacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('locacao', function(Blueprint $table)
		{
			$table->foreign('carros_idcarro', 'fk_l_carros')->references('idcarro')->on('carros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idpessoaFisica', 'fk_l_pFisica')->references('idpessoaFisica')->on('pessoafisica')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('localEntrega', 'fk_localentrega')->references('idLocadora')->on('locadora')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('locacao', function(Blueprint $table)
		{
			$table->dropForeign('fk_locacao_carros1');
			$table->dropForeign('fk_locacao_pessoaFisica1');
			$table->dropForeign('fk_localentrega');
		});
	}

}
