@extends('layouts.admin')
@section('title')
  <title>Add product</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/product/index/product.css')}}">
@endsection

@section('js')
  <script src="{{ asset('vendor\sweetAlert2\sweetalert2.js')}}"></script>
  <script src="{{ asset('admins/product/index/product.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Role', 'key' => 'List'])

  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <a href="{{ route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên role </th>
                <th scope="col">Chức năng</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)
              <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->display_name}}</td>
                <td>
                  <a href="{{ route('roles.edit',['id' => $role->id])}}" class = "btn btn-default">
                  <i class="fas fa-edit"></i>  
                  </a>

                  <a href="" data-url ="" class = "btn btn-danger action_delete">
                  <i class="fas fa-trash"></i>  
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{$roles->links()}}
        </div>
        <!-- /.col-md-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<style>
  .hidden{
    display: none;
  }
</style>
