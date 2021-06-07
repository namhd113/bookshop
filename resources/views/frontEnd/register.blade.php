@extends('frontEnd.master')

@section('title')
    Register
@endsection
@section('CSS')
    <style>
        .normal-breadcrumb{
            height: 200px;
        }
        .header_slider{
            margin-top: 60px;
        }
    </style>
@endsection
@section('search')
    <li><div style="width: 200px"></div></li>
@endsection
@section('content')

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{asset('/frontEnd/img/normal-breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center header_slider">
                    <div class="normal__breadcrumb__text">
                        <h2>Register</h2>
                        <p>Welcome to the official BooksShop.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login__form">
                        <h3>Register</h3>
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <p class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
                        @endif
                        <form action="{{route('home.register')}}" method="post" style="color: black">
                            @csrf
                            <div class="col-lg-12 row">
                                <div class="col-lg-6">
                                    <div class="input__item">
                                        <input name="name" type="text" placeholder="Username" value="{{old('name')}}"
                                          style="color: black"     class="form-control @error('name') border-danger @enderror">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input__item">
                                        <input name="email" type="email" placeholder="Email address" value="{{old('email')}}"
                                               style="color: black"      class="text-black form-control @error('email') border-danger @enderror">
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input__item">
                                        <input type="password" name="password" placeholder="Password"
                                               style="color: black"    class="text-black form-control @error('password') border-danger @enderror">
                                        <span class="icon_lock"></span>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input__item">
                                        <input name="phone" type="text" placeholder="Phone" value="{{old('phone')}}"
                                               style="color: black"     class="form-control @error('phone') border-danger @enderror">
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input__item">
                                        <input name="address" type="text" placeholder="address" value="{{old('address')}}"
                                               style="color: black"    class="form-control @error('address') border-danger @enderror">
                                        @error('address')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="input__item">
                                        <input type="password" name="confirm_password" placeholder="confirm password"
                                               style="color: black"      class="form-control @error('confirm_password') border-danger @enderror">
                                        <span class="icon_lock"></span>
                                        @error('confirm_password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Register Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection

@section('js')

@endsection

