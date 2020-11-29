<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    public function purchlists()
    {
        return $this->hasMany(Purchlist::class);
    }
}
