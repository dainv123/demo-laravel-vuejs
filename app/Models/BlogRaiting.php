<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogRaiting extends Model
{
    protected $table = 'blog_raitings';
    protected  $fillable = ['raiting', 'user_id'];
    public  $timestamps = true;
    
    public function blog(){
        return $this->belongsTo('App\Blog');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
