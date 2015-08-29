<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table="diary";
    public $timestamps=true;

    public function category(){
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comments', 'diary_id');
    }

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tags', 'tagged', 'diary_id', 'tag_id');
    }


}
