<?php


namespace App\Models;


use Illuminate\Support\Facades\Session;

class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity =$oldCart->totalQuantity;
            $this->totalPrice =$oldCart->totalPrice;
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
        $storage['totalPrice'] += $product->price;

        $this->totalQuantity ++;
        $this->totalPrice += $product->price;

        $this->items[$product->id] = $storage;
    }

    function updateCart($id, $newQuantity)
    {
        if (key_exists($id,$this->items)){
            $storage = $this->items[$id];
            $this->totalQuantity -= $storage['totalQuantity'];
            $this->totalPrice -= $storage['totalPrice'];

            $storage['totalQuantity'] = $newQuantity;
            $storage['totalPrice'] = $storage['product']->price * $newQuantity;

            $this->totalQuantity += $storage['totalQuantity'];
            $this->totalPrice += $storage['totalPrice'];

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