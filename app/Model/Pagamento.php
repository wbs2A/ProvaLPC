<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento';
    protected $primaryKey = 'idpagamento';
    public $timestamps = false;
}
