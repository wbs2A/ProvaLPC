<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassificacaocarroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classificacaocarro', function(Blueprint $table)
		{
			$table->integer('idclassificacao',true);
			$table->string('tipo', 45)->nullable();
			DB::table('classificacaocarro')->raw('ALTER TABLE  `acessorio` ADD idclassificacao INT PRIMARY KEY AUTO_INCREMENT;');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classificacaocarro');
	}

}
