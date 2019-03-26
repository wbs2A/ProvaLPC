<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHabilitacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('habilitacao', function(Blueprint $table)
		{
			$table->foreign('Estado_idEstado', 'fk_habilitacao_Estado1')->references('idEstado')->on('estado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pessoaFisica_idpessoaFisica', 'fk_habilitacao_pessoaFisica1')->references('idpessoaFisica')->on('pessoafisica')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('habilitacao', function(Blueprint $table)
		{
			$table->dropForeign('fk_habilitacao_Estado1');
			$table->dropForeign('fk_habilitacao_pessoaFisica1');
		});
	}

}
