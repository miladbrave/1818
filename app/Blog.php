<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
}
