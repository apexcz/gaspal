<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','phone','email','category','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function roles()
    {
        return $this->belongsToMany('Bican\Roles\Models\Role');
    }
}
