<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Estado;
class Habilitacao extends Model
{
    protected $table = 'habilitacao';
	protected $primaryKey = 'idhabilitacao';
	public $timestamps = false;


	public static function inserir($data){
		$estado = Estado::where('nome',$data['estado'])->first();
    	$habilitacao=new Habilitacao();
    	$habilitacao->nCNH=$data['nCNH'];
    	$habilitacao->nRegistro=$data['nRegistro'];
    	$habilitacao->dataValidade=$data['dataValidade'];
    	$habilitacao->Estado_idEstado=$estado->idEstado;
    	$habilitacao->pessoaFisica_idpessoaFisica=$data['pessoa'];
        $habilitacao->save();
        return $habilitacao;
    }
    public static function atualizar($request, $id){}
}
