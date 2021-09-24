@extends('frontend.layout.app')

@section('title', 'Register Account')

@section('content')
<section>
  <!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h2>New User Signup!</h2>
        <div class="left">
          <a href="{{ route('getProfile',['id' => Auth::id()]) }}">Account</a><i class="fa fa fa-plus"></i>
        </div>
        <div class="left">
          <a href="{{ route('getMyProducts', ['id'=>Auth::id()]) }}">Products </a><i class="fa fa fa-plus"></i>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="login-form">
          <h2>Register account</h2>
          <form method="POST">
            @csrf
            <input type="email" name="email" value="{{ $account['email'] }}" readonly/>
            <input type="password" name="password" placeholder="Password" />
            <input type="text" name="name" value="{{ $account['name'] }}" />
            <input type="text" name="phone" value="{{ $account['phone'] }}" />
            <input type="text" name="address" value="{{ $account['address'] }}" />
            <input type="file" name="avatar" class="form-control">
            <select name="countryID" class="form-control form-control-line">
              @foreach( $countries as $value)
                <option value="{{ $value->id }}"
                  @if ( $value->id == $account['accountID'])
                    selected = 'selected'
                  @endif
                >{{ $value['countryName'] }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-default">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/form-->
@endsection