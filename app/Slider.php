<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
}
