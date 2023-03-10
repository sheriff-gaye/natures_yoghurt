<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTables extends Component
{



    public function render()
    {
        $cart= Cart::content();
        $products=Products::where('product_status',1)->orderBy('category_id', 'asc')->get();
        return view('livewire.product-tables',compact('cart','products'));
         // where('product_name','like',"%{$this->search}%")
    }

    public function addToCart($product_id)
    {
        $product = Products::findOrFail($product_id);
        Cart::add(
            $product->id,
            $product->product_name,
            1,
            $product->product_price,
        );

        $this->emit('cart_updated');

    }


    public function searchBtn(){
        $this->products;
    }


}
