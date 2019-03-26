<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carros', function(Blueprint $table)
		{
			$table->foreign('idClassificacao', 'fk_carros_classificacaoCarro1')->references('idclassificacao')->on('classificacaocarro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('locadora_idLocadora', 'fk_carros_locadora1')->references('idLocadora')->on('locadora')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carros', function(Blueprint $table)
		{
			$table->dropForeign('fk_carros_classificacaoCarro1');
			$table->dropForeign('fk_carros_locadora1');
		});
	}

}
