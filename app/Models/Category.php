<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected  $fillable = ['name', 'alias', 'order', 'parent_id'];
    public  $timestamps = true;

    public function  product(){
        return $this->hasMany('App\Product');
    }
}
