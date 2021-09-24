<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'category';

  public $timestamp = false;
  
  protected $fillable = [
    'category_name'
  ];
  public function products(){
    return $this->hasMany('App\Product');
  }
}
