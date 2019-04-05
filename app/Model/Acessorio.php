<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Acessorio extends Model
{
    protected $table = 'acessorio';
    protected $primaryKey = 'idacessorio';
    public $timestamps = false;
}
