@extends('layouts.admin')
@section('title')
  <title>Trang chủ</title>
@endsection

@section('js')
  <script src="{{ asset('vendor\sweetAlert2\sweetalert2.js')}}"></script>
  <script src="{{ asset('admins/product/index/product.js')}}"></script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/contentHeader', ['name' => 'Bill', 'key' => 'List'])

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
        </div>
        @if(isset( $_GET['key']))
          <a href="{{ route('bill.index') }}" class="btn btn-link" ><i class="fa fa-arrow-left m-2"></i>Back</a>
        @endif
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tổng đơn hàng</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i=0;
              @endphp
              @foreach($orders as $order)
              @php
                $i++;
              @endphp
              <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->id}}</td>
                <td>{{number_format( $order->total,0,",",".") }}</td>
                <td>
                  <a href="{{ route('bill.order', ['id' => $order->id ]) }}" class = "btn btn-default">Xem đơn hàng</a>
                  <a href="" class = "btn btn-danger action_delete">
                  <i class="fas fa-trash"></i>  
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
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
