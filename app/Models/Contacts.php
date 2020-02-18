<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{

    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = array('contact_name','contact_company','contact_email','contact_phone','contact_message');
    public $timestamps = true;
  
}
