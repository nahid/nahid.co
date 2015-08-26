<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagged extends Model
{
    protected $table = 'tagged';
    public $timestamps=false;

    public function diaries(){
        return $this->belongsTo('App\Models\Diary');
    }
    public function tags(){
        return $this->belongsTo('App\Models\Tags');
    }
}
