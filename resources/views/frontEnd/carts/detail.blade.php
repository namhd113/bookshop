@extends('frontEnd.master')

@section('title')
    cart details
@endsection
@section('CSS')
    <style>
        .cart-swap {
            padding-top: 100px;
        }

        .cart-container {
            background-color: white;
        }

        .update-cart-item{
            color: blue;
        }
        .update-cart-item:hover{
            cursor: pointer;
        }
        .delete-cart-item{
            color: red;
        }
        .delete-cart-item:hover{
            cursor: pointer;
        }
        .normal-breadcrumb{
            height: 200px;
        }
    </style>
@endsection
@section('search')
    <li><div style="width: 200px"></div></li>
@endsection
@section('content')
    <section class="product cart-swap">
        <div class="container cart-container update_cart_url" data-url="{{route('cart.update')}}">
            @include('frontEnd.carts.list');
        </div>
    </section>
@endsection

