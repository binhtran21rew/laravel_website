@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection
@section('css')
<link href=" {{ asset('vendor\select2\select2.min.css')}}" rel="stylesheet" />
<link href=" {{ asset('admins\product\add\add.css')}}" rel="stylesheet" />
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Menus', 'key' => 'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name" class="form-control" id="text"  placeholder="nhập tên menu">
                <span>@error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </span>
                <div class="form-group">
                    <label>Chọn danh mục cha</label>
                    <select name="parent_id" class="form-control">
                      <option value="0">Chọn menu cha</option>
                      {!! $htmlOption!!}
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>
        </div>
        
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
