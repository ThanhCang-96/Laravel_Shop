<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  // protected $user;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      // $user = Auth::user();
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return View('admin.user.profile');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    $countries = Country::all();
    return View('admin.user.profile', array(
      'user' => Auth::user(),
      'countries' => $countries
    ));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UserRequest $request)
  {
    $userId = Auth::id();
    $user = User::find($userId);

    $data = $request->all();

    if (!empty($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else $data['password'] = $user->password;

    if ($request->hasFile('avatar')) {
      $avatar = $request->avatar;
      $data['avatar'] = $avatar->getClientOriginalName();
    }
    // if (!empty($avatar)) {
    //   $data['avatar'] = $avatar->getClientOriginalName();
    // }

    $upload = $user->update($data);

    if ($upload) {
      if (!empty($avatar)) {
        $avatar->move('../public/images/users', $avatar->getClientOriginalName());
      }
      $request->session()->flash('success','Thành công');
      return redirect()->back(); 
    } else{
      $request->session()->flash('error','Thất bại');
      return redirect()->back();
    }
  }
}
