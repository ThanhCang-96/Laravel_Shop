@extends('admin.layout.app')

@section('title','Edit blog')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class=" col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('blog') }}">Back</a>
          <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-md-12">Title</label>
              <div class="col-md-12">
                <input name="title" type="text" value=" {{ $data->title }}" class="form-control form-control-line">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Image</label>
              <div class="col-md-12">
                <input type="file" name="image" class="form-control" value="{{ $data->image }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Description</label>
              <div class="col-md-12">
                <input name="description" type="text" value="{{ $data->description }}" class="form-control form-control-line">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Content</label>
              <div class="col-md-12">
                <textarea name="content" id="" cols="30" rows="10">{{ $data->content }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-success">Update blog</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
@endsection