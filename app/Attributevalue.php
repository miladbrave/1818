<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributevalue extends Model
{
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
        return $this->belongsToMany(Attributevalue::class,'attributevalue_product');
    }
}
