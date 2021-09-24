<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $table = 'blog';
  public $timestamp = false;
  protected $fillable = [
    'title', 'image', 'description', 'content', 'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function comments(){
    return $this->hasMany('App\Comment');
  }

  public function rates(){
    return $this->hasMany('App\Rating');
  }
}
