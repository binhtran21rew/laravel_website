@extends('layouts.admin')
@section('title')
  <title>Add Product</title>
@endsection
@section('css')
<link href=" {{ asset('vendor\select2\select2.min.css')}}" rel="stylesheet" />
<link href=" {{ asset('admins\product\add\add.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admins/product/index/product.css')}}">

@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Slider', 'key' => 'Edit'])
  <!-- /.content-header -->

  <!-- Main content -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{ route('slider.update' , ['id' => $slider->id ])  }}" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                @csrf
                
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" value="{{$slider->name}}" name="name" class="form-control" id="name"  placeholder="nhập tên sản phẩm">
                </div>
                
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="image_path">
                    <div class="col-md-12 container_img">
                      <div class="row">
                        <img  class="img_path" src="{{$slider->img_path}}" alt="">
                      </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nhập nội dung</label>
                    <textarea class="form-control" name="description" id="content" rows="3">{{$slider->description}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </form>
  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


@section('js')
<script src="{{ asset('vendor\select2\select2.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/3c1dp4ktsp3zedexl7oqa2k01krpwm6djx10ihn7lk99k94c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('admins\product\add\add.js')}}"></script>
@endsection
