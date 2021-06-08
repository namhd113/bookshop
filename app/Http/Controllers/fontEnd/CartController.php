<?php

namespace App\Http\Controllers\fontEnd;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    function showCart()
    {

        if (Session::has('cart')){
            $cart = Session::get('cart');
            return view('frontEnd.carts.detail', compact('cart'));
        }else{
            return back();
        }
    }
    function addToCart($id)
    {

        $product = Book::find($id);
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->addProduct($product);
        Session::put('cart', $newCart);
        $cart = Session::get('cart');
        return response()->json([
            'code' => 200,
            'totalQuantity'=> $cart->totalQuantity,
            'message' => 'success',
        ],200);

    }

    function removeProduct($id)
    {
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteCartItem($id);
        Session::put('cart', $newCart);
        $cart = Session::get('cart');
        $cartRender = view('frontEnd.carts.list', compact('cart'))->render();
        return \response()->json([
            'cartRender'=>$cartRender,
            'totalQuantity'=> $cart->totalQuantity,
            'code'=>200,
        ],200);

    }

    function updateCart(Request $request)
    {

        $id = (int)$request->id;
        $quantity = (int)$request->quantity;
        if ($id != null && $quantity != null){
            $oldCart = Session::get('cart');
            $newCart = new Cart($oldCart);
            $newCart->updateCart($id, $quantity);
            Session::put('cart', $newCart);
        }
        $cart = Session::get('cart');
        $cartRender = view('frontEnd.carts.list', compact('cart'))->render();

        return \response()->json([
            'cartRender'=>$cartRender,
            'totalQuantity'=> $cart->totalQuantity,
            'code'=>200,
        ],200);
    }

    function deleteCart(): \Illuminate\Http\RedirectResponse
    {
        Session::forget('cart');
        return redirect('/');
    }

}
