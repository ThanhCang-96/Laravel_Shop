<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  protected $table = 'rating';

  public $timestamp = false;
  
  protected $fillable = [
    'rate', 'user_id', 'blog_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function blog(){
    return $this->belongsTo('App\Blog');
  }
}
