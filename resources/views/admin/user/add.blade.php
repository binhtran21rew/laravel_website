@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection
@section('css')
<link href=" {{ asset('vendor\select2\select2.min.css')}}" rel="stylesheet" />
<link href=" {{ asset('admins\product\add\add.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{ asset('vendor\select2\select2.min.js')}}"></script>
<script>
    $('.select2_init').select2({
        'tags': true,
        'placeholder': 'Chọn role'
    })
</script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Users', 'key' => 'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        <form action="{{ route('users.store') }}" method="POST" >
            @csrf
            <div class="form-group">
                <label>Tên user</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control"   placeholder="nhập tên user">
            </div>
            <span>@error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </span>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control"   placeholder="nhập email">
            </div>  
            <span>@error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </span>
            <div class="form-group">
                <label>Password</label>
                <input type="password" value="{{ old('password') }}" name="password" class="form-control"   placeholder="nhập password">
            </div>
            <span>@error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </span>
            <div class="form-group">
                <label>Role</label>
                <select name="role[]" class="form-control select2_init" multiple>
                    <option value=""></option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>

                    @endforeach
                </select>
                <span>@error('role')
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
