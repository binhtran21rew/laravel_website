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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="card_wrapper cart" data-url="{{ route('shopping.deleteCart') }}">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0 update-cart-url" data-url="{{ route('shopping.updateCart') }}">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        @include('home.component.cart')
                    </table>
                </div>
                <div class="col-lg-4">
                    <form class="mb-5" action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                        </div>
                        <div class="card-body">
                        @if(session('cart'))

                            @php
                                $total = 0;
                            @endphp
                            @foreach($carts as $cart)
                                @php
                                    $total += $cart['price'] * $cart['quantity']
                                @endphp

                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">{{$cart['name']}}</h6>
                                <h6 class="font-weight-medium">{{number_format( $cart['price'] * $cart['quantity'],0,",",".") }}</h6>
                            </div>

                            @endforeach
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{number_format( $total,0,",",".") }} vnd</h5>
                            </div>
                            <a href="{{ route('shopping.checkoutCart') }}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                        </div>
                        @else
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">No Record</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart End -->


@endsection







 