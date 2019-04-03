<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Habilitacao extends Model
{
    protected $table = 'habilitacao';
	protected $primaryKey = 'idhabilitacao';
	public $timestamps = false;


	public static function inserir($data){
    	$habilitacao=new Habilitacao();
    	$habilitacao->;
    	$habilitacao->;
    	$habilitacao->;
    	$habilitacao->;
    	$habilitacao->;
        $habilitacao->save();
        return $habilitacao;
    }
    public static function atualizar($request, $id){}
}
