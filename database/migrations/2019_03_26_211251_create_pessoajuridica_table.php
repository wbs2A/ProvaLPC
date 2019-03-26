<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePessoajuridicaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pessoajuridica', function(Blueprint $table)
		{
			$table->string('idPJ', 16);
			$table->string('razaoSocial', 45)->nullable();
			$table->integer('Endereco_idEndereco')->index('fk_pessoaJuridica_Endereco1_idx');
			$table->integer('user_iduser')->unsigned()->index('fk_pessoaJuridica_user1_idx');
			$table->integer('imagens_idimagens')->index('fk_pessoaJuridica_imagens1_idx');
			$table->primary(['idPJ']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pessoajuridica');
	}

}
