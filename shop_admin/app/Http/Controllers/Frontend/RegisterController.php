<?php

namespace App\Http\Controllers\Frontend;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Facade\FlareClient\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
  public function Create()
  {
    $countries = Country::all();
    return View('frontend.member.register', compact('countries'));
  }

  public function Store(RegisterRequest $request)
  {
    $user = $request->all();

    $userLogin = [
      'email' => $user['email'],
      'password' => $user['password'],
      'level' => 0
    ];

    // $remember = false;

    $user['password'] = Hash::make($request->password);
    if(User::create($user)){
      Auth::attempt($userLogin);
      return redirect()->route('home');
    } else {
      return redirect()->back();
    }
  }
}
