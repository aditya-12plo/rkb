<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    // use Sluggable;

    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = array('title_id','slug_id', 'seo_img','tags_id','description_id','content_id');
    public $timestamps = true;
  
    public function sluggable()
    {
        return [
            'slug_id' => [
                'source' => 'title_id'
            ]
        ];
    }
}
