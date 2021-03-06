@extends('frontend.layout.app')

@section('title', 'Product detail');

@section('menu-left')
  @include('frontend.layout.menu-left')
@endsection

@section('content')
  <div class="col-sm-9 padding-right">
    <div class="product-details">
      <!--product-details-->
      <div class="col-sm-5 image_area">
        <div class="view-product">
          <img class="img_3" 
            src="{{ asset('images/product/'.$product->user_id.'/'.json_decode($product['image'], true)[0]) }}" alt="" />
          <a class="pretty" 
            href="{{ asset('images/product/'.$product->user_id.'/img3_'.strtotime($product->updated_at).'_'.json_decode($product['image'], true)[0]) }}" rel="prettyPhoto">
              <h3>ZOOM</h3>
          </a>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            @for($i=0; $i<=2; $i++)
              <div class="item 
                @if($i == 0)
                  active = 'active'
                @endif
              ">
                @foreach(json_decode($product['image'], true) as $key => $image)
                  <img class="img_2" id="{{ $key }}" src="{{ asset('images/product/'.$product->user_id.'/img2_'.strtotime($product->updated_at).'_'.$image) }}" alt="">
                @endforeach                
                </div>
            @endfor
          </div>
          <!-- Controls -->
          <a class="left item-control" href="#similar-product" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right item-control" href="#similar-product" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
      <div class="col-sm-7">
        <div class="product-information">
          <!--/product-information-->
          <img src="images/product-details/new.jpg" class="newarrival" alt="" />
          <h2>{{ $product->product_name }}</h2>
          <p>Web ID: {{ $product->id }}</p>
          <img src="images/product-details/rating.png" alt="" />
          <span>
            <span>US ${{ round($product->price, 0) }}</span>
            <label>Quantity:</label>
            <input type="text" value="{{ $product->quantity }}" />
            <button type="button" class="btn btn-fefault cart">
              <i class="fa fa-shopping-cart"></i>
              Add to cart
            </button>
          </span>
          <p><b>Availability:</b> In Stock</p>
          @if($product->status == 0)
            <p><b>Condition:</b>New</p>
          @else
            <p><b>Condition:</b>Sale</p>
          @endif
          <p><b>Brand:</b> {{ $product->brand->brand_name }}</p>
          <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
      </div>
    </div>
    <!--/product-details-->

    <div class="category-tab shop-details-tab">
      <!--category-tab-->
      <div class="col-sm-12">
        <ul class="nav nav-tabs">
          <li><a href="#details" data-toggle="tab">Details</a></li>
          <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
          <li><a href="#tag" data-toggle="tab">Tag</a></li>
          <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade" id="details">
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery1.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery2.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery3.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery4.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="companyprofile">
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery1.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery3.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery2.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery4.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="tag">
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery1.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery2.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery3.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <img src="images/home/gallery4.jpg" alt="" />
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                    cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade active in" id="reviews">
          <div class="col-sm-12">
            <ul>
              <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
              <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
              <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur.</p>
            <p><b>Write Your Review</b></p>

            <form action="#">
              <span>
                <input type="text" placeholder="Your Name" />
                <input type="email" placeholder="Email Address" />
              </span>
              <textarea name=""></textarea>
              <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
              <button type="button" class="btn btn-default pull-right">
                Submit
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>
    <!--/category-tab-->

    
    <!--/recommended_items-->

  </div>

  <!-- script -->
  <script>
    $(document).ready(function()
    {
      $('img.img_2').click(function()
      {
        var img2 = $(this).attr('src');
        img2 = img2.slice(68,img2.length)
        // console.log(img2)

        var img3 = $(this).closest('div.image_area').find('img').attr('src');
        img3 = img3.slice(0,52);
        // console.log(img3);

        var img = $(this).closest('div.image_area').find('a').attr('href');
        img = img.slice(0,68);
        // console.log(img);

        var img_full = img3 + img2;
        var img_pretty = img + img2;

        $(this).closest('div.image_area').find('img.img_3').attr('src', img_full);
        $(this).closest('div.image_area').find('a.pretty').attr('href', img_pretty);
      })
    })
  </script>
@endsection