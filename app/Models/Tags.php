<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    public $timestamps=false;

    protected $primaryKey = null;

    public $incrementing = false;

    public function diary(){
        return $this->belongsTo('App\Models\Tagged', 'tag_id')->join('diary', 'tagged.diary_id', '=', 'diary.id');
    }
}
