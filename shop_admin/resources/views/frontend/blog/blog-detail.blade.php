@extends('frontend.layout.app')  

@section('title', 'Blog Detail')

@if (count($errors) >0)
  <ul>
    @foreach($errors->all() as $error)
      <li class="text-danger"> {{ $error }}</li>
    @endforeach
  </ul>
@endif

@section('slide')
  @include('frontend.layout.slide')
@endsection

@section('menu-left')
  @include('frontend.layout.menu-left')
@endsection

@section('content')
  <div class="col-sm-9" id="blog-detail">
    <div class="blog-post-area">
      <h2 class="title text-center">Latest From our Blog</h2>
      <div class="single-blog-post">
        <h3>Girls Pink T Shirt arrived in store</h3>
        <div class="post-meta">
          <ul>
            <li><i class="fa fa-user"></i></li>
            <li><i class="fa fa-clock-o"></i>{{ $data->created_at }}</li>
            <li><i class="fa fa-calendar"></i>{{ $data->created_at }}</li>
          </ul>
          <!-- <span>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </span> -->
        </div>
        <a href="">
          <img src="{{ asset('images/blog/'.$data->image) }}" alt="">
        </a>
        <p>{!! $data->content !!}</p>
        <div class="pager-area">
          <ul class="pager pull-right">
            <li><a href="#">Pre</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!--/blog-post-area-->

    <div class="rating-area">
      <ul class="ratings">
        <li class="rate-this">Rate this item:</li>
        <li>
          <div class="rate">
            <div class="vote">
              @for($i = 1; $i<=5; $i++)
                <div class="star_.{{ $i }} ratings_stars"><input value="{{ $i }}" type="hidden"></div>
              @endfor
              <span class="rate-np">{{ $avgRate }}</span>
            </div> 
          </div>
        </li>
      </ul>
      <ul class="tag">
        <li>TAG:</li>
        <li><a class="color" href="">Pink <span>/</span></a></li>
        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
        <li><a class="color" href="">Girls</a></li>
      </ul>
    </div>
    <!--/rating-area-->

    <div class="socials-share">
      <a href=""><img src="{{ asset('images/frontend/blog/socials.png') }}" alt=""></a>
    </div>
    <!--/socials-share-->

    <div class="media commnets">
      <a class="pull-left" href="#">
        <img class="media-object" src="{{ asset('images/frontend/blog/man-one.jpg') }}" alt="">
      </a>
      <div class="media-body">
        <h4 class="media-heading">Annie Davis</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="blog-socials">
          <ul>
            <li><a href=""><i class="fa fa-facebook"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li>
            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
          </ul>
          <a class="btn btn-primary" href="">Other Posts</a>
        </div>
      </div>
    </div>
    <!--Comments-->
    
    <div class="response-area">
      <h2>3 RESPONSES</h2>
      <ul class="media-list">
      @foreach($comment as $value)
        @if($value->level == 0) 
          <li class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="{{ asset('images/users/'.$value->user->avatar) }}" alt="" width="70px" height="70px">
            </a>

            <div class="media-body">
              <ul class="sinlge-post-meta">
                <li><i class="fa fa-user"></i>{{ $value->user->name }}</li>
                @if($value->created_at)
                  <li><i class="fa fa-clock-o"></i> {{ $value->created_at->format('d-m-Y') }}</li>
                  <li><i class="fa fa-calendar"></i> {{ $value->created_at->format('H:m:s') }}</li>
                @endif  
              </ul>
              <p>{{ $value->content }}</p>
              <a id="replay"  class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
            </div>
          </li>
        @endif
          
        @foreach($comment as $value2)
          @if($value2->level == $value->id) 
            <li class="media second-media">
              <a class="pull-left" href="#">
                <img class="media-object" src="{{ asset('images/users/'.$value2->user->avatar) }}" alt="" width="50px" height="50px">
              </a>
              <div class="media-body">
                <ul class="sinlge-post-meta">
                  <li><i class="fa fa-user"></i>{{ $value2->user->name }}</li>
                  @if($value2->created_at)
                    <li><i class="fa fa-clock-o"></i> {{ $value2->created_at->format('d-m-Y') }}</li>
                    <li><i class="fa fa-calendar"></i> {{ $value2->created_at->format('H:m:s') }}</li>
                  @endif
                </ul>
                <p>{{ $value2->content }}</p>
                <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
              </div>
            </li>
          @endif
        @endforeach
        <div class="replay-box" id="replay-comment" style="display: none;">
          <div class="row">
            <div class="col-sm-12">
              <a class="leave-replay">Leave a replay</a>
              <form action="{{ route('postRepComment', ['id' => $data->id,'level' => $value->id]) }}" method="post">
                @csrf
                <div class="text-area">
                  <div class="blank-arrow">
                    <label>Content</label>
                  </div>
                  <span>*</span>
                  <textarea name="content" rows="10"></textarea>
                </div>
                <button type="submit">Replay comment</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      </ul>
    </div>
    <!--/Response-area-->

    <div class="replay-box" id="comment">
      <div class="row">
        <div class="col-sm-12">
          <h2>Comment</h2>
          <form action="{{ route('postComment', ['id' => $data->id]) }}" method="post">
            @csrf
            <div class="text-area">
              <div class="blank-arrow">
                <label>Your Name</label>
              </div>
              <span>*</span>
              <textarea name="content" rows="10"></textarea>
            </div>
            <button> Post comment </button>
          </form>
        </div>
      </div>
    </div>
    <!--/Repaly Box-->
  </div>
  <script>
    $(document).ready(function(){
    //vote
    $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote'); 
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

    $('.ratings_stars').click(function(){
      var checkLogin = "{{ Auth::id() }}"
        if (checkLogin) {
          var value =  $(this).find("input").val();
          var _token = $('input[name="_token"]').val()
          if ($(this).hasClass('ratings_over')) {
                $('.ratings_stars').removeClass('ratings_over');
                $(this).prevAll().andSelf().addClass('ratings_over');
            } else {
              $(this).prevAll().andSelf().addClass('ratings_over');
            }
            // console.log(1111)
          $.ajax({
          url:"{{ url('/blog/ajax_rate')}}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
          method:"POST", // phương thức gửi dữ liệu.
          data:{
            value:value, 
            _token:_token,
            idBlog: checkLogin
          },
          success:function(data){ //dữ liệu nhận về
          // $('#countryList').fadeIn();  
          // $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
          }
        })
      } else {
        alert("Please login to rating");
        return window.location.href = "{{ route('getLogin') }}"
      }
    });
  });
  </script>
@endsection
