<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','firstname', 'lastname', 'lastname', 'sex', 'birthday', 'status', 'subscribe','role_id', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function product(){
        return $this->hasMany('App\Models\Product');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function hasPermission(Permission $permission){
        return !!optional(($this->role)->permissions)->contains($permission);
    }
}
