@extends('frontEnd.master')

@section('title')
    login
@endsection
@section('CSS')
    <style>
        .normal-breadcrumb{
            height: 200px;
        }
        .login{
            padding-top: 50px;
            padding-bottom: 100px;
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
                        <h2>Login</h2>
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
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <p class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
                        @endif
                        <form action="{{route('home.check-login')}}" method="post">
                            @csrf
                            <div class="input__item">
                                <input
                                        style="color: black"
                                        name="email" type="email" placeholder="Email address" value="{{old('email')}}">
                            </div>
                            <div class="input__item">
                                <input
                                        style="color: black"
                                        type="password" name="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="{{route('home.show-form-register')}}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                        Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection

@section('js')

@endsection
