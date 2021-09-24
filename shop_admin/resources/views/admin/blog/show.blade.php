@extends('admin.layout.app')

@section('title','Blog detail')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Blog</h4>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex align-items-center justify-content-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <!-- Row -->
      <div class="row">
        <!-- Column -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <article>
                <h2>{{ $data->title }}</h2>
                <div>
                  <img src="{{ asset('images/blog/'.$data->image) }}" width="40px" height="40px">
                </div>
                {{ $data->content }}
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection