<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkoutcontroller extends Controller
{
    public function index(){
        return view('checkout');
    }
}
