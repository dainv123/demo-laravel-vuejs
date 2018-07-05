<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected  $fillable = ['name', 'alias', 'intro', 'content', 'image', 'keywords', 'description','user_id','categorie_id'];
    public  $timestamps = true;
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function blog_review(){
        return $this->hasMany('App\BlogReiew');
    }

    public function blog_raiting(){
        return $this->hasMany('App\BlogRaiting');
    }

}
