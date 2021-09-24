@extends('frontend.layout.app')

@section('title', 'Register member account');

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
      <h2>Register account</h2>
      <form action="{{ route('postRegister') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email Address" />
        <input type="password" name="password" placeholder="Password" />
        <input type="password" name="password_confirmation" placeholder="Password confirm" />
        <input type="text" name="name" placeholder="Full Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <input type="text" name="address" placeholder="Address" />
        <select name="countryID">
          @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->countryName }}</option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-default">Register</button>
      </form>
    </div>
    <!--/login form-->
  </div>
@endsection