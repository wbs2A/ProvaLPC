<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = 'locacao';
	protected $primaryKey = ['idLocadora', 'carros_idcarro', 'idpessoaFisica'];
	public $timestamps = false;
}
