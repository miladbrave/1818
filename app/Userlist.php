<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    public function purchlists()
    {
        return $this->hasMany(Purchlist::class);
    }

    public function getStatusPayAttribute()
    {
        if ($this->status == "success"){
            return '<span class="badge badge-success">موفق</span>';
        }else if ($this->status == "fail"){
            return '<span class="badge badge-danger">ناموفق</span>';
        }
    }
}
