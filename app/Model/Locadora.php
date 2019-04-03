<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Locadora extends Model
{
    protected $table = 'locadora';
	protected $primaryKey = 'idLocadora';
	public $timestamps = false;
}
