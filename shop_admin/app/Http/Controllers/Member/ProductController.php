<?php

namespace App\Http\Controllers\Member;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    if(Auth::check())
    {
      $user = User::find($id);
      $products = $user->products;
      // $images = json_decode($products['image'], true);
      return View('frontend.product.list', array(
        'products' => $products,
        // 'images' => $images
      ));
    } else {
      return redirect()->route('getLogin');
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $caregory = Category::all();
    $brand = Brand::all();
    return View('frontend.product.create', array(
      'category' => $caregory,
      'brand' => $brand
    ));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {
    $product = $request->all();
    if($request->hasfile('image'))
    {
      $images = $request->file('image');
      if(count($images) <= 3)
      {
        $data = [];
        foreach($images as $img)
        {
          $name = $img->getClientOriginalName();
          $name_2 = "img2_".time().'_'.$img->getClientOriginalName();
          $name_3 = "img3_".time().'_'.$img->getClientOriginalName();
          
          // $img->move($save_path, $name);
          $dir = "../public/images/product/".Auth::id();
 
          if(!file_exists($dir)){
            mkdir($dir);
          }
          
          $path = public_path('images/product/'.Auth::id().'/' . $name);
          $path2 = public_path('images/product/'.Auth::id().'/' . $name_2);
          $path3 = public_path('images/product/'.Auth::id().'/' . $name_3);

          Image::make($img->getRealPath())->save($path);
          Image::make($img->getRealPath())->resize(85, 84)->save($path2);
          Image::make($img->getRealPath())->resize(329, 380)->save($path3);
          
          $data[] = $name;
        }
      }
    }

    // $product= new Product();
    // $product->filename=json_encode($data);
    // $product->save();
    $product['image'] = json_encode($data);
    if(Product::create($product))
    {
      return redirect()->back()->with('status', 'Your product insert successfully');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = Product::find($id);
    $category = Category::all();
    $brand = Brand::all();
    return View('frontend.product.edit', compact([
      'product',
      'category',
      'brand']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);

    $data_product = $request->all();

    if($data_product['status'] == 0)
    {
      $data_product['sale_price'] = 0;
    }

    if($request->hasfile('image'))
    {
      $images = $request->file('image');
      if(count($images) <= 3)
      {
        $data = [];
        foreach($images as $img)
        {
          $name = $img->getClientOriginalName();
          $name_2 = "img2_".time().'_'.$img->getClientOriginalName();
          $name_3 = "img3_".time().'_'.$img->getClientOriginalName();
          
          // $img->move($save_path, $name);
          $dir = "../public/images/product/".Auth::id();
 
          if(!file_exists($dir)){
            mkdir($dir);
          }
          
          $path = public_path('images/product/'.Auth::id().'/' . $name);
          $path2 = public_path('images/product/'.Auth::id().'/' . $name_2);
          $path3 = public_path('images/product/'.Auth::id().'/' . $name_3);

          Image::make($img->getRealPath())->save($path);
          Image::make($img->getRealPath())->resize(85, 84)->save($path2);
          Image::make($img->getRealPath())->resize(329, 380)->save($path3);
          
          $data[] = $name;
        }
      }
      $data_product['image']=json_encode($data);
    } else {
      $data_product['image'] = $product->image;
    }

    if($product->update($data_product))
    {
      return redirect()->back()->with('status', 'Update succesfully');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    
  }
}
