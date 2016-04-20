<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table="comments";
    public $timestamps=true;

    public function diary()
    {
      return $this->belongsTo('App\Models\Diary');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

}
