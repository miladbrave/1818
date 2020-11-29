<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchlist extends Model
{
    protected $fillable =['factor_number','product_id','count','price'];

    public function userlist()
    {
        return $this->belongsTo(Userlist::class);
    }
}
