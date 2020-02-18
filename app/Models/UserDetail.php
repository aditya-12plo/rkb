<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    protected $table = 'users_detail';
    protected $primaryKey = 'id';
    protected $fillable = array('user_id','country','province','city','area','sub_area','postal_code','village','address');
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}
