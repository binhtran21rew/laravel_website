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
  @include('partials/contentHeader', ['name' => 'Silder', 'key' => 'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên slider</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"  placeholder="nhập tên slider">
                <span>@error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </span>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control"  name="description" id="description" rows="3">{{ old('description') }}</textarea>
                <span>@error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </span>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="image" class="form-control-file" id="description">
                <span>@error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </span>
            </div>
                <input type="submit" class="btn btn-primary" value="Submit">
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
