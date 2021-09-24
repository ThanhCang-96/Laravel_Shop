<?php

namespace App\Http\Controllers\Member;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $country = Country::all();
    $account = User::find($id);
    return View('frontend.member.edit', array(
      'countries' => $country,
      'account' => $account
    ));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UserRequest $request, $id)
  {
    $user = User::find($id);
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
