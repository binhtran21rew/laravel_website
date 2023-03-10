<div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach($categories as $category)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{$category->name}} @if($category->childen->count())<i class="fa fa-angle-down float-right mt-1"></i> @endif</a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($category->childen as $child)
                                <a href="{{ route('category.product', ['slug' => $child->slug, 'id' => $child->id]) }}" class="dropdown-item">{{$child->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                    </div>
                </nav>
            </div>