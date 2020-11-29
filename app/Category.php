<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','type'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'attribute_category')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

