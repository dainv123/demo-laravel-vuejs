<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected  $fillable = ['title'];
    public  $timestamps = true;

    public function permission_role(){
        return $this->hasMany('App\Models\PermissionRole');
    }
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
