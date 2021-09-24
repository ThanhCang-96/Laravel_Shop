<?php

namespace App\Http\Controllers\Member;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    // session()->forget('cart');
    $categories = Category::all();
    $products = Product::paginate(6);
    $brands = Brand::all();
    return View('frontend.shop.index', compact(['products', 'categories','brands']));
  }
}
