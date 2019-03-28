<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateEstadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estado', function(Blueprint $table)
		{
			$table->integer('idEstado', true);
			$table->string('nome', 45)->nullable();
			DB::table('Estado')->raw('ALTER TABLE  `Estado` ADD idEstado INT PRIMARY KEY AUTO_INCREMENT;');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estado');
	}

}
