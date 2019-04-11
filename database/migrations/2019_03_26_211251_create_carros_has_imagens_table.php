<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosHasImagensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carros_has_imagens', function(Blueprint $table)
		{
			$table->integer('carros_idcarro')->index('fk_carros_has_imagens_carros1_idx');
			$table->integer('imagens_idimagens')->index('fk_carros_has_imagens_imagens1_idx');
			$table->primary(['carros_idcarro','imagens_idimagens']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carros_has_imagens');
	}

}
