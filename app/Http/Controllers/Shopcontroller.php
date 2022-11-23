<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class Shopcontroller extends Controller
{
    public function index(){
        return view('shop');
    }


}

