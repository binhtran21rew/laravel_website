@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Category', 'key' => 'edit'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên danh mục</label>
                <input  type="text" 
                        name="name" 
                        class="form-control" 
                        id="text"  
                        value="{{$category->name}}"
                        placeholder="nhập tên danh mục">

                <div class="form-group">
                    <label>Chọn danh mục cha</label>
                    <select name="parent_id" class="form-control">
                      <option value="0">Chọn danh mục cha</option>
                      {!! $htmlOption !!}

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
