<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarrosHasImagensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carros_has_imagens', function(Blueprint $table)
		{
			$table->foreign('carros_idcarro', 'fk_carros_has_imagens_carros1')->references('idcarro')->on('carros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('imagens_idimagens', 'fk_carros_has_imagens_imagens1')->references('id')->on('file_entries')->onUpdate('NO ACTION')->onDelete('NO ACTION');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carros_has_imagens', function(Blueprint $table)
		{
			$table->dropForeign('fk_carros_has_imagens_carros1');
			$table->dropForeign('fk_carros_has_imagens_imagens1');
		});
	}

}
