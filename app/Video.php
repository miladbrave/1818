<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
}
