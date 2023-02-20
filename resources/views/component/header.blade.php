  <!-- Topbar Start -->
  <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('storeHome')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">B</span>Store</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ route('category.search')}}" method="Get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="key" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{ route('shopping.cart') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    @if(session('cart'))
                    @php $cart = session()->get('cart'); 
                         $i = 0;
                         foreach($cart as $data){
                            $i += $data['quantity'];
                         }
                    
                    @endphp
                    <span class="badge">{{$i}}</span>
                    @endif
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->