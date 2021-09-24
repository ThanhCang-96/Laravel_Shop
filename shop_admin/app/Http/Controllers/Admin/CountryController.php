<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class CountryController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }
 
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $country = Country::all();
    return View('admin.country.list', compact('country'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return View('admin.country.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CountryRequest $request)
  {
    $country = $request->all();
    if (Country::create($country)) {
      $request->session()->flash('success', 'Thành công');
    } else {
      $request->session()->flash('error', 'Thất bại');
    }
    return redirect('admin/country');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $country = Country::find($id);
    $user = Auth::user();
    return View('admin.country.edit', compact('country'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CountryRequest $request, $id)
  {
    $country = Country::find($id);
    if ($country->update($request->all())) {
      $request->session()->flash('success', 'Thành Công');
    } else {
      $request->session()->flash('error', 'Thất bại');
    }
    return redirect('admin/country');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $cauthu = Country::find($id);
    $deleteData = $cauthu->delete();
    //Kiểm tra lệnh delete để trả về một thông báo
    if ($deleteData) {
      $request->session()->flash('success','Xoá thành công');
    }else {                        
      $request->session()->flash('error','Thất bại');
    }
    return redirect('country');
  }
}
