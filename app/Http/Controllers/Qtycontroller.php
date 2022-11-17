<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class Qtycontroller extends Controller
{
    public function increase($rowId){
        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId, $qty);

        return redirect()->back();
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

        return back();
    }
}
