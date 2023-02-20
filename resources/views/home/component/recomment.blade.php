    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bán chạy</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">

            @foreach($productRecomment as  $value)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{number_format( $value->price,0,",",".") }}</p>
                    <a href="{{ route('category.detail', ['id' => $value->id ])}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid  custom_img" src="{{ $value->img_path }}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{ $value->name }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->