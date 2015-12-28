<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    public $timestamps=false;


    public function diary()
       {
           return $this->belongsToMany('App\Models\Diary', 'tagged', 'tag_id', 'diary_id');
       }
}
