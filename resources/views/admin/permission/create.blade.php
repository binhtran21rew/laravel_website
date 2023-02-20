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
  @include('partials/contentHeader', ['name' => 'Permissions', 'key' => 'Create'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Chọn module</label>
                <select name="moduleParent" class="form-control">
                    <option value="">--Chọn module--</option>
                    @foreach(config('permissions.table_module') as $table)
                    <option value="{{ $table}}"> {{ $table}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    @foreach(config('permissions.module_action') as $action)
                        <div class="col-md-3">
                            <label for="">
                                <input type="checkbox" value="{{$action}}" name="moduleChild[]">
                                {{$action}}
                            </label>
                        </div>
                    @endforeach
                </div>
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
