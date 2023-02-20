@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection

@section('js')
  <script src="{{ asset('vendor\sweetAlert2\sweetalert2.js')}}"></script>
  <script src="{{ asset('admins/product/index/product.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Category', 'key' => 'List'])

  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <form action="" class="form-inline">
              <div class="form-group">
                <input class="form-control" name="key" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </form>
            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        @if(isset( $_GET['key']))
          <a href="{{ route('categories.index') }}" class="btn btn-link" ><i class="fa fa-arrow-left m-2"></i>Back</a>
        @endif
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($categories as $cate)
              <tr>
                <th scope="row">{{$cate->id}}</th>
                <td>{{$cate->name}}</td>
                <td>
                  <a href="{{ route('categories.edit',['id' => $cate->id])}}" class = "btn btn-default">
                  <i class="fas fa-edit"></i>  
                  </a>

                  <a href="" data-url ="{{ route('categories.delete', ['id' => $cate->id]) }}"class = "btn btn-danger action_delete">
                  <i class="fas fa-trash"></i>  
                  </a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            {{$categories->links()}}
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
