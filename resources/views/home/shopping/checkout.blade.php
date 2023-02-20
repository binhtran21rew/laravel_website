@extends('layouts.main')
@section('title')
<title>Home page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('customStore/home.css')}}">
<link rel="stylesheet" href="{{asset('customStore/custom.css')}}">

@endsection

@section('js')
<script src="{{asset('customStore/cart.js')}}"></script>


@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <form  action="{{ route('shopping.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" name="name" type="text" placeholder="Name" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="email" placeholder="example@email.com" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Giới tính</label>
                                <input type="radio" name="gender" value="Nam" checked="checked" style="width: 10%;"><span>Nam</span>
                                <input type="radio" name="gender" value="Nữ" checked="checked" style="width: 10%;"><span>Nữ</span>

                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" placeholder="123 456 789" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" type="text" placeholder="123 Street" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if(session('cart'))
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>
                            @php
                                $total = 0;
                            @endphp
                            @foreach( $carts as $cartitem)
                                @php
                                    $total += $cartitem['price'] * $cartitem['quantity']
                                @endphp
                            <div class="d-flex justify-content-between">
                                <p>{{$cartitem['name']}}</p>
                                <p>x{{$cartitem['quantity']}}</p>
                                <p>{{number_format( $cartitem['price'] * $cartitem['quantity'],0,",",".") }}</p>
                            </div>
                            @endforeach
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">{{number_format( $total,0,",",".") }} đ</h6>
                            </div>
                        
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{number_format( $total,0,",",".") }} đ</h5>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card border-secondary mb-5 ">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">No products to checkout</h5>
                                <span>please go back <a href="{{ route('category.shop') }}">home page</a>  to add product to cart</span>

                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Hình thức thanh toán</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" value="thanh toán trực tiếp" id="paypal" required>
                                    <label class="custom-control-label" for="paypal">Thanh toán trục tiếp</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" value="chuyển khoảng"id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Chuyển khoảng ngân hàng</label>
                                </div>
                            </div>
                        </div>
                        @if(session('cart'))
                        <div class="card-footer border-secondary bg-transparent">
                            <button type="submit" name="" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                        @endif
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!-- Checkout End -->

@endsection

   


