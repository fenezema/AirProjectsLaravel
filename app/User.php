<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'nrp', 'department', 'phone', 'github', 'website', 'descTitle', 'describe', 'tags', 'saldo', 'email', 'password', 'photo', 'level', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany('App\Projects');
    }

    public function review(){
        return $this->hasMany('App\Review');
    }

    public function request(){
        return $this->hasMany('App\Permintaan');
    }

    public function projecttag(){
        return $this->hasMany('App\ProjectTag');
    }
}
