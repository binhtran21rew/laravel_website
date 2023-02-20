@extends('layouts.admin')
@section('title')
  <title>Add product</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/product/index/product.css')}}">
@endsection

@section('js')
  <script src="{{ asset('vendor\sweetAlert2\sweetalert2.js')}}"></script>
  <script src="{{ asset('admins/product/index/product.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Slider', 'key' => 'List'])

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
            <a href="{{ route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        @if(isset( $_GET['key']))
          <a href="{{ route('slider.index') }}" class="btn btn-link" ><i class="fa fa-arrow-left m-2"></i>Back</a>
        @endif
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên Slider</th>
                <th scope="col">Description</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($slider as $sliderItem)
              <tr>
                <th scope="row"> {{$sliderItem->id}}</th>
                <td> {{$sliderItem->name}}</td>
                <td> {{$sliderItem->description}}</td>
                <td>
                    <img  class="img_path" src="{{$sliderItem->img_path}}" alt="">
                </td>
                <td>
                  <a href="{{ route('slider.edit' ,['id' => $sliderItem->id] )}}" class="btn btn-default">
                  <i class="fas fa-edit"></i>  
                  </a>
                  <a href="" data-url ="{{ route('slider.delete' ,['id' => $sliderItem->id] )}}"  class="btn btn-danger action_delete">
                  <i class="fas fa-trash"></i>  
                  </a>
                </td>
              </tr>
            
            </tbody>
            @endforeach
          </table>
        </div>
        <div class="col-md-12">
        {{$slider->links()}}
        

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
