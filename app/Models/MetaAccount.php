<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaAccount extends Model
{

    protected $table = 'meta_account';
    protected $primaryKey = 'id';
    protected $fillable = array('user_id','used','username','password');
    public $timestamps = true;
  
    public function user()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}
