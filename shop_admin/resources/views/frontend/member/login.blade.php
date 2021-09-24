@extends('frontend.layout.app')

@section('title', 'Login');

@if (count($errors) >0)
  <ul>
    @foreach($errors->all() as $error)
      <li class="text-danger"> {{ $error }}</li>
    @endforeach
  </ul>
@endif

@if (session('status'))
  <ul>
    <li class="text-danger"> {{ session('status') }}</li>
  </ul>
@endif

@section('content')
  <div class="col-sm-4 col-sm-offset-1 align-center">
    <div class="login-form">
      <!--login form-->
      <h2>Login to your account</h2>
      <form action="" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email Address" />
        <input type="password" name="password" placeholder="Password" />
        <span>
          <input name="remember" type="checkbox" class="checkbox">
          Keep me signed in
        </span>
        <button type="submit" class="btn btn-default">Login</button>
      </form>
    </div>
    <!--/login form-->
  </div>
@endsection