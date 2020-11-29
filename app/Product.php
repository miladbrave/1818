<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function attributevalus()
    {
        return $this->belongsToMany(Attributevalue::class,'attributevalue_product');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
