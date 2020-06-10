<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function marts(){
        return $this->belongsToMany(Mart::class,'mart_products');
    }
    public function customers(){
        return $this->belongsToMany(Mart::class,'customer__products');
    }
}
