@extends('frontend.layout.app')

@section('title', 'Blog')

@section('slide')
  @include('frontend.layout.slide')
@endsection

@section('menu-left')
  @include('frontend.layout.menu-left')
@endsection

@section('content')
  <div class="col-sm-9">
    <div class="blog-post-area">
      <h2 class="title text-center">Latest From our Blog</h2>

      @foreach($data as $value)
        <div class="single-blog-post">
          <h3>{{ $value->title }}</h3>
          <div class="post-meta">
            <ul>
              <li><i class="fa fa-user"></i> {{ $value->author }}</li>
              <li><i class="fa fa-clock-o"></i>{{ $value->created_at }}</li>
              <li><i class="fa fa-calendar"></i>{{ $value->created_at }}</li>
            </ul>
            <span>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-o"></i>
            </span>
          </div>
          <a href="">
            <img src="{{ asset('images/blog/'.$value->image) }}" alt="">
          </a>
          <p>{{ $value->description }}</p>
          <a class="btn btn-primary" href="blog/{{ $value->id }}">Read More</a>
        </div>
      @endforeach
      
      <div class="pagination-area">
        <ul class="pagination">
          {{ $data->links() }}
        </ul>
      </div>

    </div>
  </div>
@endsection
