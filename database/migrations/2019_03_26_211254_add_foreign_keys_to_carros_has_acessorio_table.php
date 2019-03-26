<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarrosHasAcessorioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carros_acessorio', function(Blueprint $table)
		{
			$table->foreign('acessorio_idacessorio', 'fk_carros_acessorio')->references('idacessorio')->on('acessorio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('carros_idcarro', 'fk_acessorio_carros')->references('idcarro')->on('carros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carros_has_acessorio', function(Blueprint $table)
		{
			$table->dropForeign('fk_carros_has_acessorio_acessorio1');
			$table->dropForeign('fk_carros_has_acessorio_carros1');
		});
	}

}
