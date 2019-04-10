<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Endereco;
class Locadora extends Model
{
    protected $table = 'locadora';
	protected $primaryKey = 'idLocadora';
	public $timestamps = false;

	public static function inserir($data){
		$locadora = new Locadora();
		$endereco= Endereco::inserir($data);
		$locadora->pessoaJuridica_idPJ=$data['id'];
		$locadora->nome=$data['nome'];
		$locadora->Endereco_idEndereco=$endereco->idEndereco;
		$locadora->tipoProtecao=$data['tipoProtecao'];
		$locadora->idadeMediaFrota=$data['idadeMediaFrota'];
		$locadora->horarioAtendimento=$data['horarioAtendimento'];
		$locadora->save();
		return $locadora;
	}
	public static function alterar($data){
		$locadora = Locadora::find($data['id']);
		$endereco= Endereco::alterar($data);
		$locadora->nome=$data['nome'];
		$locadora->Endereco_idEndereco=$endereco->idEndereco;
		$locadora->tipoProtecao=$data['tipoProtecao'];
		$locadora->idadeMediaFrota=$data['idadeMediaFrota'];
		$locadora->horarioAtendimento=$data['horarioAtendimento'];
		$locadora->save();
		return $locadora;
	}
}
