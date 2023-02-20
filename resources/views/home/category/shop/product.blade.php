@extends('layouts.main')
@section('title')
<title>Home page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('customStore/home.css')}}">
<link rel="stylesheet" href="{{asset('customStore/custom.css')}}">

@endsection

@section('js')
<script src="{{ asset('vendor\sweetAlert2\sweetalert2.js')}}"></script>
<script src="{{asset('customStore/cart.js')}}"></script>


@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
     <!-- Shop Start -->
     <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                    @if(isset($productSearch))
                        @foreach($productSearch as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{$data->img_path}}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{$data->name}}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{number_format( $data->price,0,",",".") }}</h6><h6 class="text-muted ml-2"><del></del></h6>
                                    </div>
                                </div>
                                <di$valuev class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('category.detail', ['id' => $data->id ])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" data-url="{{ route('shopping.addCart', [ 'id' => $data->id ])}}"  class="btn btn-sm text-dark p-0 add_to_cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </di$valuev>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                {{$productSearch->links()}}  
                            </ul>
                            </nav>
                        </div>
                    @else
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="{{$product->img_path}}" alt="">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>{{number_format( $product->price,0,",",".") }}</h6><h6 class="text-muted ml-2"><del></del></h6>
                                    </div>
                                </div>
                                <di$valuev class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('category.detail', ['id' => $product->id ])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    <a href="" data-url="{{ route('shopping.addCart', [ 'id' => $product->id ])}}"  class="btn btn-sm text-dark p-0 add_to_cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                </di$valuev>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 pb-1">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-3">
                                {{$products->links()}}  
                            </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
   

@endsection





