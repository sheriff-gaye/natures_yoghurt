<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartTables extends Component
{
    public $count=0;
    public function render()
    {
        $carts=Cart::content();
        $products=Products::all();
        return view('livewire.cart-tables',compact('carts','products'));
    }

    public function increase($rowId){

        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId, $qty);



    }

    public function decrease($rowId){

        $product=Cart::get($rowId);
        $qty=$product->qty;
        $min=1;
        if($qty>$min)
        {
            $qty-=1;

        }
        else{
            $qty=$min;
        }

        Cart::update($rowId, $qty);


    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');
    }

    public function clear()
    {
        Cart::destroy();

        $this->emit('cart_updated');
    }
}
