<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected  $fillable = ['name',  'intro', 'description', 'image', 'user_id','product_id'];
    public  $timestamps = true;
    
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
