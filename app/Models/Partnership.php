<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{

    protected $table = 'partnership';
    protected $primaryKey = 'id';
    protected $fillable = array('name','email','phone','terms_and_conditions');
    public $timestamps = true;
  
}
