<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attributevalue()
    {
        return $this->hasMany(Attributevalue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'attribute_category')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
