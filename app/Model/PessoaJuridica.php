<?php

namespace App\Model;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\Model\Exception;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    protected $table = 'pessoajuridica';
	protected $primaryKey = 'idPJ';
	public $incrementing = false;
	public $timestamps = false;
    public static function inserir($data){
            $pessoa=new PessoaJuridica();
            $pessoa->idPJ=$data['cnpj'];
            $pessoa->razaoSocial=$data['razaoSocial'];
            $pessoa->Endereco_idEndereco=$data['endereco'];
            $pessoa->user_iduser=$data['user'];
        	$pessoa->save();
        if(empty($pessoa)){
            return 405;
        }
    	return 200;
    }
    public static function atualizar($request, $id){}
}
