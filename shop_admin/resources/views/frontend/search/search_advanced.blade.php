@extends('frontend.layout.app')

@section('title', 'Shop frontend')

@if (session('status'))
  <ul>
    <li class="text-danger"> {{ session('status') }}</li>
  </ul>
@endif

@section('slide')
  @include('frontend.layout.slide')
@endsection

@section('menu-left')
  @include('frontend.layout.menu-left')
@endsection

@section('content')
  <div class="col-sm-9 padding-right">
    <div class="features_items">
      <!--features_items-->
      <h2 class="title text-center">Features Items</h2>
      <div class="container">
        <div class="row">
          <form id="search-form" action="{{ route('search.advanced') }}" method="GET">
            <div class="form-group col-sm-2" style="width: 15%;">
            <input name="name" class="form-control" type="text" placeholder="Name" value="{{ $_GET['name'] }}"/>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="price" class="filter-make filter form-control">
                <option value="">Choose price</option>
                @for($i=0;$i<=200;$i+=50)
                  <option value="{{ json_encode([$i, $i+50], true)}}"
                    @if($i == $_GET['price'])
                      selected = 'selected';
                    @endif
                  >{{$i}}->{{$i+50}}$</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="category" class="filter-model filter form-control">
                <option value="">Category</option>
                @foreach($categories as $val)
                  <option value="{{ $val->id }}"
                    @if($val->id == $_GET['category'])
                      selected = 'selected';
                    @endif
                  >{{ $val->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="brand" class="filter-type filter form-control">
                <option value="">Brand</option>
                @foreach($brands as $val)
                  <option value="{{ $val->id }}"
                  @if($val->id == $_GET['brand'])
                      selected = 'selected';
                    @endif  
                  >{{ $val->brand_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-1" style="width: 15%;">
              <select name="status" class="filter-price filter form-control">
                <option value="">Status</option>
                <option value="0"
                  @if('0' == $_GET['status'])
                    selected = 'selected';
                  @endif 
                >New</option>
                <option value="1"
                  @if('1' == $_GET['status'])
                    selected = 'selected';
                  @endif 
                >Sale</option>
              </select>
            </div>
            <div class="form-group" style="width: 75%;">
              <button type="submit" class="btn btn-block btn-primary" style="text-align: center;">Search</button>
            </div>
          </form>
        </div>
      </div>

      @forelse($products as $product)
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img class='img' src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
              <h2>{{ round($product->price,0) }}$</h2>
              <p>{{ $product->product_name }}</p>
              <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>   
            <div class="product-overlay">
              <div class="overlay-content">
                <p class='id' style='display: none;'>{{ $product->id }}</p>
                <h2>{{ round($product->price,0) }}$</h2>
                <p><a href="{{ route('product.show', ['id'=> $product->id]) }}">{{ $product->product_name }}</a></p>
                <button type="submit" class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</button>
              </div>
            </div>
          </div>
          <div class="choose">
            <ul class="nav nav-pills nav-justified">
              <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
              <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
          </div>
        </div>
      </div>
      @empty
      <h1>No data</h1>
      @endforelse
    </div>
    {{ $products->links() }}
  </div>
@endsection