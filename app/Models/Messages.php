<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table="messages";
    public $timestamps=true;

    public function setImageAttribute($value)
    {
        $gravatarImageHash=md5( strtolower( trim( $value ) ) );
        $this->attributes['image'] = 'http://www.gravatar.com/avatar/'.$gravatarImageHash;
    }
}
