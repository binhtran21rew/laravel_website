@extends('layouts.admin')
@section('title')
  <title>Add Product</title>
@endsection
@section('css')
<link href=" {{ asset('vendor\select2\select2.min.css')}}" rel="stylesheet" />
<link href=" {{ asset('admins\product\add\add.css')}}" rel="stylesheet" />
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Product', 'key' => 'Add'])
  <!-- /.content-header -->

  <!-- Main content -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                @csrf
                <div class="col-md-12">
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name"  placeholder="nhập tên sản phẩm">
                    <span>@error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input  value="{{ old('price') }}"  type="number" name="price" class="form-control" id="price"  placeholder="nhập giá sản phẩm">
                    <span>@error('price'){{$message}}@enderror</span>
                    <span>@error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </span>

                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="image_path">
                    <span>@error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </span>
                    

                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết</label>
                    <input type="file" name="images[]" class="form-control-file" id="image_path" multiple>
                </div>
                <div class="form-group">
                    <label>Chọn danh mục cha</label>
                    <select name="category_id" class="form-control select2_init">
                      <option value="">Chọn danh mục </option>
                      {!! $htmlOption!!}
                    </select>
                    <span>@error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </span>
                </div>

                <div class="form-group">
                  <label>Nhập tag cho sản phẩm</label>
                  <select name="tags[]" class="form-control tag_select" multiple="multiple">

                  </select>
                </div>


            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nhập nội dung</label>
                    <textarea class="form-control " name="contents" id="content" rows="3"> {{ old('contents') }}</textarea>
                    <span>@error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </span>

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
