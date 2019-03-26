<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrosHasAcessorioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros_acessorio', function(Blueprint $table)
		{
			$table->integer('carros_idcarro')->index('fk_carros_acessorio_idx');
			$table->integer('acessorio_idacessorio')->index('fk_acessorio_carros_idx');
			$table->primary(['carros_idcarro','acessorio_idacessorio']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros_has_acessorio');
	}

}
