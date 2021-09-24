<header id="header">
  <!--header-->
  <div class="header_top">
    <!--header_top-->
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contactinfo">
            <ul class="nav nav-pills">
              <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/header_top-->

  <div class="header-middle">
    <!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-md-4 clearfix">
          <div class="logo pull-left">
            <a href="index.html"><img src="{{ asset('images/frontend/home/logo.png') }}" alt="" /></a>
          </div>
          <div class="btn-group pull-right clearfix">
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                USA
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="">Canada</a></li>
                <li><a href="">UK</a></li>
              </ul>
            </div>

            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                DOLLAR
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="">Canadian Dollar</a></li>
                <li><a href="">Pound</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8 clearfix">
          <div class="shop-menu clearfix pull-right">
            <ul class="nav navbar-nav">
              <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
              @if(session()->has('cart'))
                @if(count(session()->get('cart')) > 0)
                  <li><a class="qty" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> {{ count(session()->get('cart')) }}</a></li>  
                @else
                  <li><a class="qty" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                @endif
              @else
                <li><a class="qty" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
              @endif
              @if(Auth::check())
                <li><a href="{{ route('getLogout') }}">Checkout</a></li>
                <li><a href="{{ route('getProfile',['id' => Auth::id()]) }}"><i class="fa fa-user"></i> Account</a></li>
                <li>
                  <a href="{{ route('getProfile',['id' => Auth::id()]) }}">
                    <img src="{{ asset('images/users/'.Auth::user()->avatar) }}" alt="user" class="rounded-circle" width="31">
                  </a>
                </li>
              @else
                <li><a href="{{ route('getRegister') }}">Register</a></li>
                <li><a href="{{ url('/member/login') }}">Login</a></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/header-middle-->

  <div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="mainmenu pull-left">
            <ul class="nav navbar-nav collapse navbar-collapse">
              <li><a href="index.html" class="active">Home</a></li>
              <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                <ul role="menu" class="sub-menu">
                  <li><a href="shop.html">Products</a></li>
                  <li><a href="product-details.html">Product Details</a></li>
                  <li><a href="cart.html">cart</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                <ul role="menu" class="sub-menu">
                  <li><a href="{{ route('blog') }}">Blog List</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                </ul>
              </li>
              <li><a href="404.html">404</a></li>
              <li><a href="contact-us.html">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="search_box pull-right">
            {{ Form::open(['route' => 'search.name', 'method' => 'GET'])}}
              <div>
                <input type="text" name="product_name" id="product_name" placeholder="Enter product name" />
              </div>
              {{ Form::submit('Search') }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/header-bottom-->
</header>
<!--/header-->
