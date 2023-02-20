    <!-- Products Start -->
    @foreach($list as $value)
    <div class="container-fluid pt-5">
        @foreach($value as $key => $data)
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">{{$key}}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($data as $info)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid  custom_img w-100" src="{{$info->img_path}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$info->name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format( $info->price,0,",",".") }}</h6><h6 class="text-muted ml-2"><del></del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('category.detail', ['id' => $info->id ])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="#" data-url="{{ route('shopping.addCart', [ 'id' => $info->id ])}}" class="btn btn-sm text-dark p-0 add_to_cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        @endforeach
    </div>
    @endforeach
    <!-- Products End -->