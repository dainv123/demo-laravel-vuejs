<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected  $fillable = ['order_id','user_id','total_price', 'status'];
    public  $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function detailorder(){
        return $this->hasMany('App\DetailOrder');
    }
}
