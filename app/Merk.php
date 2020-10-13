<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merk extends Model
{
    protected $table = "merk"; 
    use SoftDeletes;
}
