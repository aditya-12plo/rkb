<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{

    protected $table = 'deposit';
    protected $primaryKey = 'id';
    protected $fillable = array('user_id','admin_id','account_number','total_deposit','image_deposit','reason','status');
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','admin_id','id');
    }
  
}
