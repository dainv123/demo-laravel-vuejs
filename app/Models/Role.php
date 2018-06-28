<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected  $fillable = ['title'];
    public  $timestamps = true;

    public function permission_role(){
        return $this->hasMany(App\PermissionRole);
    }
}
