<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locacao', function(Blueprint $table)
		{
			$table->integer('carros_idcarro');
			$table->integer('idLocadora');
			$table->string('idpessoaFisica', 13)->index('fk_l_pFisica_idx');
			$table->date('dataEntrega')->nullable();
			$table->integer('localEntrega')->index('fk_localentrega_idx');
			$table->float('valorTotal', 10, 0)->nullable();
			$table->primary(['carros_idcarro','idLocadora','idpessoaFisica']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locacao');
	}

}
