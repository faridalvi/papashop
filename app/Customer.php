<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class,'customer__products');
    }
}
