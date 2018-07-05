<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
        'name', 'dimension'
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
