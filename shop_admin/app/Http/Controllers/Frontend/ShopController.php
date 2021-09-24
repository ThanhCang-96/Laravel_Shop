<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ShopController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    $brands = Brand::all();
    $products = Product::paginate(3);
    return View('frontend.shop.index', compact(['products', 'categories', 'brands']));
  }

  public function showProduct($id)
  {
    $product = Product::find($id);
    return View('frontend.product.product_detail', compact('product'));
  }

  public function searchName(Request $request)
  {
    $categories = Category::all();
    $brands = Brand::all();
    $name = $request->product_name;
    $products = Product::searchName($name, 1);
    return View('Frontend.search.search', compact(['products', 'categories', 'brands']));
  }

  public function search(Request $request)
  {
    $product = Product::query();
    if (isset($request->name)) {
      $product->where('product_name', 'LIKE', '%' . $request->name . '%');
    }

    if ($request->price != "") {
      $price = json_decode($request->price);
      $product->where([
        ['price', '>=', $price[0]],
        ['price', '<=', $price[1]]
      ]);
    }

    if ($request->category != "") {
      $product->where('category_id', $request->category);
    }

    if ($request->brand != "") {
      $product->where('brand_id', $request->brand);
    }

    if ($request->status != "") {
      $product->where('status', $request->status);
    }

    $products = $product->paginate(1);
    // $products = $product->get();
    $categories = Category::all();
    $brands = Brand::all();
    return View('Frontend.search.search_advanced', compact(['products', 'categories', 'brands']));
  }

  public function searchPrice()
  {
    $price = $_POST['price'];

    $products = Product::whereBetween('price',[$price[0], $price[1]])->get()->toArray();
    if(!empty($products))
    {
      return response()->json(["products" => $products]);
    }
  }
}
