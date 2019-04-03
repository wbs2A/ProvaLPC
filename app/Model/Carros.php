<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    protected $table = 'carros';
	protected $primaryKey = 'idcarro';
	public $timestamps = false;
}
