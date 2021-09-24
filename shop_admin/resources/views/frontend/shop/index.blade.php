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
              <input name="name" class="form-control" type="text" placeholder="Name"/>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="price" class="filter-make filter form-control">
                <option value="">Choose price</option>
                @for($i=0;$i<=200;$i+=50)
                  <option value="{{ json_encode([$i, $i+50], true)}}">{{$i}}->{{$i+50}}$</option>
                @endfor
              </select>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="category" class="filter-model filter form-control">
                <option value="">Category</option>
                @foreach($categories as $val)
                  <option value="{{ $val->id }}">{{ $val->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-2" style="width: 15%;">
              <select name="brand" class="filter-type filter form-control">
                <option value="">Brand</option>
                @foreach($brands as $val)
                  <option value="{{ $val->id }}">{{ $val->brand_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-sm-1" style="width: 15%;">
              <select name="status" class="filter-price filter form-control">
                <option value="">Status</option>
                <option value="0">New</option>
                <option value="1">Sale</option>
              </select>
            </div>
            <div class="form-group" style="width: 75%;">
              <button type="submit" class="btn btn-block btn-primary">Search</button>
            </div>
          </form>
        </div>
      </div>

      <div class="product-item">
        @foreach($products as $product)
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
        @endforeach
      </div>
      
    </div>
    {{ $products->links() }}
    <!--features_items-->

    <div class="category-tab">
      <!--category-tab-->
      <div class="col-sm-12">
        <ul class="nav nav-tabs">
          @foreach($categories as $key=>$value)

            <li class="
              @if($key == 0)
                active = 'active'
              @endif
              ">
              <a href="#{{ $value->category_name }}" data-toggle="tab">{{ $value->category_name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="tab-content">
        @foreach($categories as $key=>$value)
          <div class="tab-pane fade 
            @if($key == 0)
              active = 'active'
            @endif 
            in" id="{{ $value->category_name }}">
            @foreach($value->products as $product)
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
                      <h2>{{ round($product->price,0) }}$</h2>
                      <p><a href="{{ route('product.show', ['id'=> $product->id]) }}">{{ $product->product_name }}</a></p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
      <!--recommended_items-->
      <h2 class="title text-center">recommended items</h2>

      <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($products as $key=>$product)
            <div class="item 
              @if($key == 0)
                active = 'active'
              @endif 
            ">
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
                      <h2>{{ round($product->price,0) }}$</h2>
                      <p><a href="{{ route('product.show', ['id'=> $product->id]) }}">{{ $product->product_name }}</a></p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
                      <h2>{{ round($product->price,0) }}$</h2>
                      <p>{{ $product->product_name }}</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
                      <h2>{{ round($product->price,0) }}$</h2>
                      <p>{{ $product->product_name }}</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
    <!--/recommended_items-->
  </div>
  <script>
    $(document).ready(function()
    {
      $("button.add-to-cart").click(function(){
        var getId = $(this).closest("div.single-products").find("p.id").text();
        var _token = $('input[name="_token"]').val()
        console.log(getId);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url:"{{ url('/addtocart') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
          method:"POST", // phương thức gửi dữ liệu.
          data:{
            product_id:getId, 
            _token:_token,
          },
          success:function(data){ //dữ liệu nhận về
          // $('#countryList').fadeIn();  
          // $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
          $('a.qty').text(data)
          console.log(data);
          }
        })
      })

      $('div.slider-track').click(function(){
        var _token = $('input[name="_token"]').val();
        var price = $(this).next().find("div.tooltip-inner").text();
        var price = price.split(" : ");
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url:"{{ url('/search/price') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
          method:"POST", // phương thức gửi dữ liệu.
          data:{
            price:price,
            _token:_token,
          },
          success:function(data){
            if(data.products)
            {
              var products = data.products;
              var html ="";
              products.map(function(value,key)
              {
                var arrImg = JSON.parse(value['image']);
                var img = "{{ URL::to('../public/images/product/') }}";
                html += '<div class="col-sm-4">' +
                          '<div class="product-image-wrapper">' +
                            '<div class="single-products">'+
                              '<div class="productinfo text-center">' +
                                // '<img class="img" src="asset("images/product/"$product["user_id"]"/".json_decode($product["image"], true)[0])" alt="" />' +
                                '<img class="img" src="' + img + '/' +value["user_id"]+ "/"+ arrImg[0]+ '" alt="" />' +
                                '<h2>' +Math.round(value["price"]) + '$</h2>' +
                                '<p>' + value["product_name"] + '</p>' +
                                '<a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>' +
                              '</div>' +
                              '<div class="product-overlay">' +
                                '<div class="overlay-content">' +
                                  '<p class="id" style="display: none;">.$product["id"].</p>'+
                                  '<h2>' +Math.round(value["price"]) + '$</h2>' +
                                  '<p><a href="http://localhost/shop_admin/public/product/' +value["id"] + '">' + value["product_name"] +'</a></p>'+
                                  // '<p><a href="{{route("product.show", ["id" =>'+ value["id"]+'])}}">' + value["product_name"] +'</a></p>'+
                                  '<button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>' +
                                '</div>' +
                              '</div>' +
                            '</div>' +
                            '<div class="choose">' +
                              '<ul class="nav nav-pills nav-justified">' +
                                '<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>' +
                                '<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>' +
                              '</ul>' +
                            '</div>' +
                          '</div>' +
                        '</div>';
              })
            }
            $('.product-item').html(html)
          }
        })
      });
    })
  </script>
@endsection