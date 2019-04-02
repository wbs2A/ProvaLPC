<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcessorioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acessorio', function(Blueprint $table)
		{
			$table->integer('idacessorio', true);
			$table->string('nome', 45)->nullable();
			DB::table('acessorio')->raw('ALTER TABLE  `acessorio` ADD idacessorio INT PRIMARY KEY AUTO_INCREMENT;');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('acessorio');
	}

}
