<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
    protected $fillable = ['filename', 'mime', 'path', 'size'];
}
