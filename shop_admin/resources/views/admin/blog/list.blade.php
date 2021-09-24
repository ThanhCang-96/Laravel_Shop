@extends('admin.layout.app')

@section('title','Blog')

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
              <table id="datatable" style="border: 1px solid; width: 100%;">
                <h2>List Blog</h2>
                <thead>
                  <tr role="row">
                    <th>ID</th>
                    <th style="width: 10%;">Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th style="width: 7%;">Show</th>
                    <th style="width: 7%;">Edit</th>
                    <th style="width: 10%;">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($blog as $key => $value)
                    <tr role="row">
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->title }}</td>
                      <td>
                        <img src="{{ asset('images/blog/'.$value->image) }}" width="40px" height="40px">
                      </td>
                      <td>{{ $value->description }}</td>
                      <td><a href="blog/{{ $value->id }}/show">Show</a></td>
                      <td><a href="blog/{{ $value->id }}/edit">Edit</a></td>
                      <td><a href="blog/{{ $value->id }}/delete"> Delete</a></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="8">
                      <a href="{{ url('admin/blog/create') }}">Create blog</button></a>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection