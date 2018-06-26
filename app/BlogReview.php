<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogReview extends Model
{
    protected $table = 'blog_reviews';
    protected  $fillable = ['review', 'user_id'];
    public  $timestamps = true;
    
    public function blog(){
        return $this->belongsTo('App\Blog');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
