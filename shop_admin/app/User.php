<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'avatar', 'countryID', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country(){
      return $this->belongsTo('App\Country');
    }

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function rates(){
        return $this->hasMany('App\Rating');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function histories(){
        return $this->hasMany('App\History');
    }
}
