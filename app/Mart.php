<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mart extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class,'mart_products');
    }
}
