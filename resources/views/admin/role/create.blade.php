@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection
@section('css')
<link href=" {{ asset('vendor\select2\select2.min.css')}}" rel="stylesheet" />
<link href=" {{ asset('admins\role\style.css')}}" rel="stylesheet" />
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
           <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" style="width: 100%">
                <div class="col-md-12">
                    @csrf
                    <div class="form-group">
                        <label>Tên vai trò</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"  placeholder="nhập tên role">
                        <span>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Mô tả vai trò</label>
                        <textarea class="form-control"  name="display_name" id="display_name" rows="3">{{ old('display_name') }}</textarea>
                        <span>
                            @error('display_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach($permissions as $data)
                        <div class="card text-bg-primary mb-3 col-md-12 parent">
                            <div class="card-header">
                                <label>
                                    <input type="checkbox" value="" class="checkbox_parent">
                                </label>
                                Module {{$data->name}}
                            </div>
                            <div class="row">
                                @foreach($data->roles as $childRole)
                                <div class="card-body text-primary col-md-3">
                                    <h5 class="card-title">
                                        <label>
                                            <input type="checkbox" class="checkbox_child" name="permission[]" value="{{$childRole->id}}">
                                        </label>
                                        {{$childRole->name}}
                                    </h5>
                                </div>
                                @endforeach
                            </div>                        
                        </div>
                        @endforeach
                    </div>    
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
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
    <script src="{{ asset('admins\role\action.js')}}"></script>
@endsection
