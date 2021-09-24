<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table = 'history';

  public $timestamp = false;
  
  protected $fillable = [
    'email', 'phone', 'name', 'user_id', 'price'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
