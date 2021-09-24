<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'product';

  public $timestamp = false;
  
  protected $fillable = [
    'product_name',
    'quantity',
    'price',
    'description',
    'image',
    'status',
    'sale_price',
    'category_id',
    'brand_id',
    'user_id'
  ];

  public function category(){
    return $this->belongsTo('App\Category');
  }

  public function brand(){
    return $this->belongsTo('App\Brand');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public static function searchName($name, $paginate)
  {
    return Product::where('product_name', 'like', '%' . $name . '%')->paginate($paginate, ['*'], 'np');
  }
}
