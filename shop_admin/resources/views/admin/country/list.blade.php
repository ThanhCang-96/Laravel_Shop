@extends('admin.layout.app')

@section('title','Country')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Country</h4>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex align-items-center justify-content-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Country</li>
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
                <h1>Country</h1>
                <thead>
                  <tr role="row">
                    <th>ID</th>
                    <th>Country Name</th>
                    <th style="width: 7%;">Edit</th>
                    <th style="width: 10%;">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($country as $key => $value)
                    <tr role="row">
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->countryName }}</td>
                      <!-- <td><a href="country/{{ $value->id }}/edit">Edit</a></td> -->
                      <td><a href="{{ url('admin/country/'.$value->id.'/edit') }}">Edit</a></td>
                      <td><a href="{{ url('admin/country/'.$value->id.'/delete') }}"> Delete</a></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="8">
                      <a href="{{ url('admin/country/create') }}">Thêm Quốc gia</button></a>
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