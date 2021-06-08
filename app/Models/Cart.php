<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = [];
    public $totalQuantity = 0;


    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity =$oldCart->totalQuantity;

        }
    }

    function addProduct($product)
    {
        $storage = [
            'product' => $product,
            'totalQuantity' => 0,
            'totalPrice' => 0
        ];

        if (key_exists($product->id, $this->items)){
            $storage = $this->items[$product->id];
        }
        $storage['totalQuantity']++;


        $this->totalQuantity ++;
        $this->totalPrice += $product->price;

        $this->items[$product->id] = $storage;
    }

    function updateCart($id, $newQuantity)
    {
        if (key_exists($id,$this->items)){
            $storage = $this->items[$id];
            $this->totalQuantity -= $storage['totalQuantity'];


            $storage['totalQuantity'] = $newQuantity;
            $storage['totalPrice'] = $storage['product']->price * $newQuantity;

            $this->totalQuantity += $storage['totalQuantity'];


            $this->items[$id] = $storage;
        }
    }

    function deleteCartItem($id)
    {
        $storage = $this->items[$id];
        $this->totalQuantity -= $storage['totalQuantity'];
        $this->totalPrice -= $storage['totalPrice'];
        unset($this->items[$id]);
    }
}
