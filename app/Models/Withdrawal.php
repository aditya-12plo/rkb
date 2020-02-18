<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{

    protected $table = 'withdrawal';
    protected $primaryKey = 'id';
    protected $fillable = array('user_id','admin_id','reason','account_number','total_withdrawal','image_withdrawal','status');
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
