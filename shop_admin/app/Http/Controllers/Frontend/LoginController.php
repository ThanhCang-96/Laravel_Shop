<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function checkRedirect(User $user)
  {
    if ($user->level == 1) {
      return redirect()->route('getAdmin');
    }
    if ($user->level == 0) {
      return redirect('member/');
    }
  }

  public function getLogin()
  {
    // if(!session()->has('url.intended'))
    // {
    //     session(['url.intended' => url()->previous()]);
    // }
    // return View('frontend.member.login');   
    if (Auth::check()) {
      redirect('/');
    } else {
      return View('frontend.member.login');
    }
  }

  public function postLogin(LoginRequest $request)
  {
    $user = $request->all();
    $login = [
      'email' => $user['email'],
      'password' => $user['password'],
      'level' => 0
    ];

    $remember = false;

    if ($request->remember) {
      $remember = true;
    }

    if (Auth::attempt($login, $remember)) {
      return redirect()->route('home')->with('success', 'Success');
    } else {
      return redirect()->back()->with('error', 'Fails');
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('getLogin');
  }
}
