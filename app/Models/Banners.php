<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{

    protected $table = 'banner';
    protected $primaryKey = 'id';
    protected $fillable = array('sequence','description_id','description_en','images_name');
    public $timestamps = true;
  
}
