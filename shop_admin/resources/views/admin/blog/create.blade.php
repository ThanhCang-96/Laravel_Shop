@extends('admin.layout.app')

@section('title','Blog')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class=" col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="col-md-12">Title</label>
              <div class="col-md-12">
                <input name="title" type="text" value="" class="form-control form-control-line">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Image</label>
              <div class="col-md-12">
                <input type="file" name="image" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Description</label>
              <div class="col-md-12">
                <input name="description" type="text" value="" class="form-control form-control-line">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Content</label>
              <div class="col-md-12">
                <textarea name="content" id="" cols="30" rows="10"></textarea>
              </div>
            </div>

            <input name="user_id" type="hidden" value=" {{ $user->id }}" class="form-control form-control-line">
            
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-success">Create blog</button>
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