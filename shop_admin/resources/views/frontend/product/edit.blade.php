@extends('frontend.layout.app')

@section('title', 'Update Product')

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
<section>
  <!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h2>My Account!</h2>
        <div class="left">
          <a href="{{ route('getProfile',['id' => Auth::id()]) }}">Account</a><i class="fa fa fa-plus"></i>
        </div>
        <div class="left">
          <a href="{{ route('getMyProducts', ['id'=>Auth::id()]) }}">Products </a><i class="fa fa fa-plus"></i>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="login-form">
          <h2>Update product</h2>
          <form method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_name" value="{{ $product->product_name }}" />
            <input type="text" name="price" value="{{$product->price}}" />
            <select name="category_id" class="form-control form-control-line">
              @foreach( $category as $value)
                <option value="{{ $value->id }}"
                  @if ( $value->id == $product['category_id'])
                    selected = 'selected'
                  @endif
                >{{ $value->category_name }}</option>
              @endforeach
            </select>
            <select name="brand_id" class="form-control form-control-line">
              @foreach( $brand as $value)
              <option value="{{ $value->id }}"
                @if ( $value->id == $product['brand_id'])
                    selected = 'selected'
                @endif>{{ $value->brand_name }}</option>
              @endforeach
            </select>
            <input type="text" name="quantity" value="{{ $product->quantity }}" />
            <select id="status" name="status" class="form-control form-control-line" onchange="showSale()">
              <option value="0"
                @if ( 0 == $product['status'])
                  selected = 'selected'
                @endif
              > New </option>
              <option value="1" 
                @if ( 1 == $product['status'])
                  selected = 'selected'
                @endif
              >Sale</option>
            </select>
            <input id="sale_price" type="text" name="sale_price" value="{{ $product->sale_price }}" style="width: 25%;"/>
            <input type="file" name="image[]" class="form-control" multiple>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="form-control" multiple>
            <textarea name="description" cols="30" rows="10">{{ $product->description }}</textarea>
            <button type="submit" class="btn btn-default">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/form-->
<script>
  function showSale()
  {
    $('#sale_price').hide();
    var val = document.getElementById("status").value;
    if(val == 1)
    {
      $('#sale_price').show();
    }
  }
</script>
@endsection