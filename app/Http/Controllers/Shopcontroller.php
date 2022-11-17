<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class Shopcontroller extends Controller
{
    public function index(){
        $products=Products::all()->where('product_status',1);
        $cart = Cart::content();
        return view('shop',compact('products','cart'));
    }


}
