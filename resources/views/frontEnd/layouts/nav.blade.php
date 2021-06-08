<header class="header">
    <div class="container">
        <div class="row">
            <!--            <div class="col-lg-1">-->
            <!--                <div class="header__logo">-->
            <!--                    <a href="./index.html">-->
            <!--                        <img src="img/logo.png" alt="">-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="col-lg-7">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{route('home.view-all')}}">Homepage</a></li>
{{--                            <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>--}}
{{--                                <ul class="dropdown">--}}
{{--                                    @foreach($categories as $category)--}}

{{--                                        <li><a href="{{route('home.books-of-category', $category->id)}}" id="{{$category->id}}">{{$category->name}}</a></li>--}}

{{--                                    @endforeach--}}

{{--                                </ul>--}}
{{--                            </li>--}}
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-5 ">
                <div class="header__nav ">
                    <nav class="header__menu mobile-menu">
                        <ul>
                        @yield('search')
                        <!--                            <li><a><i class="fa fa-search"></i></a></li>-->
                            <li class="col-2">
                                <div class="row">
                                    <div style="display: inline-flex; align-items: center">
                                        <div>
                                            <a href="{{route('cart.show')}}" style="font-size: 18px" class="show-cart-detail">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                                                                @if(\Illuminate\Support\Facades\Session::has('cart'))

                                        <div>
                                            <p id="total_quantity" style="color: red">({{\Illuminate\Support\Facades\Session::get('cart')->totalQuantity ?? 0}})</p>
                                        </div>
                                                                                @endif
                                    </div>
                                </div>
                            </li>
                            <li class="col-3">
                                @if(\Illuminate\Support\Facades\Auth::guard('customer')->user())
                                    <a><span class="icon_profile"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="">{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}</a></li>
                                        <li><a href="{{route('home.logout')}}">logout</a></li>
                                    </ul>
                                @else
                                    <a href="{{route('home.login')}}"><span class="icon_profile"></span>Login</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('home.show-form-register')}}">Register</a></li>
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
