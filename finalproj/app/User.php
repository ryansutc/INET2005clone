<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //get the roles that a user has
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //get the pages that a user has edited
    public function users()
    {
        return $this->hasMany('App\User', 'id', 'created_by');
    }

    //get the roles for a user
    public function isAdmin()
    {
        foreach($this->roles as $role) {
            if($role->role_desc == 'Admin') {
                return true;
            }
        }
        return false;
    }

    //get the roles for a user
    public function isEditor()
    {
        foreach($this->roles as $role) {
            if($role->role_desc == 'Edit') {
                return true;
            }
        }
        return false;
    }

    //get the roles for a user
    public function isAuthor()
    {
        foreach($this->roles as $role) {
            if($role->role_desc == 'Auth') {
                return true;
            }
        }
        return false;
    }


}
