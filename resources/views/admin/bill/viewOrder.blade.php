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

  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <h3>Thông tin người mua</h3>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tên người đặt</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->gender}}</td>
                <td>{{$order->email}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="col-md-12">
        </div>
        
       
        <!-- /.col-md-12 -->
      </div>
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <h3>Thông tin vận chuyển</h3>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="col-md-12">
        </div>
        
       
        <!-- /.col-md-12 -->
      </div>
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <h3>Chi tiết đơn hàng</h3>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Phương thức thanh toán</th>

              </tr>
            </thead>
            <tbody>
              @php 
                $tong = 0;
              @endphp
              @foreach($orders_id as $value)
              @php 
                $tong += $value->price * $value->quantity;
              @endphp
              <tr>
                <th scope="row">{{$value->id_bill}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->payment}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="col-md-12">
        </div>
        
       
        <!-- /.col-md-12 -->
      </div>
      <div class="row">
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <h3>Tổng đơn hàng:  <span>{{number_format( $tong,0,",",".") }}đ</span></h3>
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
