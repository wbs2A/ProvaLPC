<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';
    protected $primaryKey = 'idimagens';
    public $timestamps = false;
}
