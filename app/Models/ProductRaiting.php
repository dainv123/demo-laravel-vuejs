<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRaiting extends Model
{
    protected $table = 'product_raitings';
    protected  $fillable = ['raiting', 'user_id'];
    public  $timestamps = true;
    
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
