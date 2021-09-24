<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class CartController extends Controller
{
  public function addCart(Request $request)
  {
    $data = $request->all();
    $product_id = $data['product_id'];
    $product = Product::find($product_id)->toArray();

    $cart = session()->get('cart');
    if(isset($cart[$product_id]))
    {
      $cart[$product_id]['qty'] += 1;
    } else {
      $cart[$product_id] = [
        'product_name' => $product['product_name'],
        'qty' => 1,
        'price' => $product['price'],
        'image' => json_decode($product['image'], true),
        'user_id' => $product['user_id']
      ];
    }
    session()->put('cart', $cart);
    // var_dump(session()->get('cart'));
    echo count(session()->get('cart'));
  }

  public function index(Request $request)
  {
    if (session()->has('cart')) {
      $cart = session()->get('cart');
      return View('frontend.cart.list', compact('cart'));
    } else {
      return redirect()->back()->with('status', 'There are no products in the cart');
    }
  }

  public function upQuantity()
  {
    $product_id = $_POST['product_id'];
    echo $product_id;
    if (session()->has('cart')) {
      $cart = session()->get('cart');
      if (isset($cart[$product_id])) {
        $cart[$product_id]['qty'] += 1;
        session()->put('cart', $cart);
      }
    }
  }

  public function downQuantity()
  {
    $product_id = $_POST['product_id'];
    echo $product_id;
    if (session()->has('cart')) {
      $cart = session()->get('cart');
      if (isset($cart[$product_id])) {
        $cart[$product_id]['qty'] -= 1;
        $qty = $cart[$product_id]['qty'];
        if($qty == 0)
        {
          unset($cart[$product_id]);
        }
        session()->put('cart', $cart);
      }
    } else {
      session()->forget('cart');
    }
  }

  public function pay()
  {
    if(session()->has('cart'))
    {
      session()->forget('cart');
    }
    return redirect()->route('home');
  }

  public function delete()
  {
    $product_id = $_POST['product_id'];
    if(session()->has('cart'))
    {
      $cart = session()->get('cart');
      if (isset($cart[$product_id])) {
        unset($cart[$product_id]);
      }
      if (count($cart) == 0) {
        session()->forget('cart');
        echo 'out';
      } else {
        session()->put('cart', $cart);
      }
    }
  }
}
