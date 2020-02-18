<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{

    protected $table = 'mails';
    protected $primaryKey = 'id';
    protected $fillable = array('name','email','password','driver','host','port','encryption');
    public $timestamps = false;
  
}
