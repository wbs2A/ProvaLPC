<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLocadoraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('locadora', function(Blueprint $table)
		{
			$table->foreign('Endereco_idEndereco', 'fk_locadora_Endereco1')->references('idEndereco')->on('endereco')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pessoaJuridica_idPJ', 'fk_locadora_pessoaJuridica1')->references('idPJ')->on('pessoajuridica')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('locadora', function(Blueprint $table)
		{
			$table->dropForeign('fk_locadora_Endereco1');
			$table->dropForeign('fk_locadora_pessoaJuridica1');
		});
	}

}
