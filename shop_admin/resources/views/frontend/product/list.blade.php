@extends('frontend.layout.app')

@section('title', 'My Products')

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
  <div class="container-fluid">
    <div class="row">
      <!-- Column -->
      <div class="col-sm-3">
        <h2>My Account</h2>
        <div class="left">
          <a href="{{ route('getProfile',['id' => Auth::id()]) }}">Account</a><i class="fa fa fa-plus"></i>
        </div>
        <div class="left">
          <a href="{{ route('getMyProducts', ['id'=>Auth::id()]) }}">Products </a><i class="fa fa fa-plus"></i>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="card">
          <div class="card-body">
            <table id="datatable" style="border: 1px solid; width: 100%;">
              <h1>MY PRODUCTS</h1>
              <thead style="background-color: khaki;">
                <tr role="row">
                  <th>ID</th>
                  <th>Name</th>
                  <th colspan="3">Image</th>
                  <th>Price</th>
                  <th colspan="2">action</th>
                  <!-- <th style="width: 7%;">Edit</th>
                  <th style="width: 10%;">Delete</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach($products as $value)
                  <tr role="row">
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->product_name }}</td>
                    @foreach(json_decode($value['image'], true) as $key => $image)
                      <td><img width="30px" height="30px" src="{{ asset('images/product/'.Auth::id().'/'.$image) }}" alt="abc"></td>
                    @endforeach
                    <td>{{ round($value->price,0) }}$</td>
                    <td><a href="{{ route('product.edit',['id'=>$value->id]) }}">Edit</a></td>
                    <td><a href=""> Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="8">
                    <a href="{{ route('product.create') }}">Add product</button></a>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection