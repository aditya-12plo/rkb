<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newslaters extends Model
{

    protected $table = 'newslater';
    protected $primaryKey = 'id';
    protected $fillable = array('email');
    public $timestamps = true;
  
}
