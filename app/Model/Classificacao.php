<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    protected $table = 'classificacaocarro';
	protected $primaryKey = 'idclassificacao';
	public $timestamps = false;


	public static function todos(){
		return Classificacao::rightJoin('carros', 'carros.idClassificacao', '=','classificacaocarro.idclassificacao')->select('classificacaocarro.idclassificacao', 'classificacaocarro.tipo')->get();
	}
}
