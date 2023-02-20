<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav mr-auto py-0">
        <a href="{{route('storeHome')}}" class="nav-item nav-link active">Home</a>
        <a href="{{ route('category.shop') }}" class="nav-item nav-link">Shop</a>
        <!-- <a href="{{ route('category.detail') }}" class="nav-item nav-link">Shop Detail</a> -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
            <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ route('shopping.cart') }}" class="dropdown-item">Shopping Cart</a>
                <a href="{{ route('shopping.checkoutCart') }}" class="dropdown-item">Checkout</a>
            </div>
        </div>
    </div>
    <div class="navbar-nav ml-auto py-0">
        @auth
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">welcom {{auth()->user()->name}}</a>
            <div class="dropdown-menu rounded-0 m-0">
                <a href="{{ route('logout') }}" class="dropdown-item">Log out</a>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
        @endauth
    </div>
</div>