<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected  $fillable = ['name', 'alias', 'price', 'oldprice', 'intro', 'content', 'image', 'hoverimage','keywords', 'description','avaibility', 'user_id','categorie_id', 'size_id'];
    public  $timestamps = true;
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function productsize(){
        return $this->belongsTo('App\ProductSize');
    }

    public function pimages(){
        return $this->hasMany('App\ProductImage');
    }

    public function product_review(){
        return $this->hasMany('App\ProductReiew');
    }

    public function product_raiting(){
        return $this->hasMany('App\ProductRaiting');
    }
}
