<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected  $fillable = ['title','name'];
    public  $timestamps = true;

    public function permission_role(){
        return $this->hasMany('App\PermissionRole');
    }
}
