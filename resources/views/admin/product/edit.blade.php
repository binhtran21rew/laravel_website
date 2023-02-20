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
  @include('partials/contentHeader', ['name' => 'Product', 'key' => 'Edit'])
  <!-- /.content-header -->

  <!-- Main content -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                @csrf
                
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" value="{{$product->name}}" name="name" class="form-control" id="name"  placeholder="nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" value="{{$product->price}}"  name="price" class="form-control" id="price"  placeholder="nhập giá sản phẩm">
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="image_path">
                    <div class="col-md-12 container_img">
                      <div class="row">
                        <img  class="img_path" src="{{$product->img_path}}" alt="">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết</label>
                    <input type="file" name="images[]" class="form-control-file" id="image_path" multiple>
                    <div class="col-md-12">
                      <div class="row">
                        @foreach($product->productImage as $imgItem)
                        <div class="col-md-3">
                          <img  class="img_path_edit" src="{{$imgItem->path}}" alt="">
                        </div>                       
                        @endforeach
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Chọn danh mục cha</label>
                    <select name="category_id" class="form-control select2_init">
                      <option value="">Chọn danh mục </option>
                      {!! $htmlOption!!}
                    </select>
                </div>

                <div class="form-group">
                  <label>Nhập tag cho sản phẩm</label>
                  <select name="tags[]" class="form-control tag_select" multiple="multiple">
                    @foreach($product->relation_tags as $tagitem)
                      <option value="{{$tagitem->id}}" selected>{{$tagitem->name}}</option>
                    @endforeach
                  </select>
                </div>

                  
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nhập nội dung</label>
                    <textarea class="form-control tinymce_editor_init" name="contents" id="content" rows="3">{{$product->content}}</textarea>
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
