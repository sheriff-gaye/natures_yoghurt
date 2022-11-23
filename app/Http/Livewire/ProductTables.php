<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTables extends Component
{

    public $products;
    public $search;
    protected $queryString=['search'];


    public function render()
    {
        $cart= Cart::content();
        $this->products=Products::where('product_name','like',"%{$this->search}%")->where('product_status',1)->latest()->get();
        return view('livewire.product-tables',compact('cart'),[
            'products'=>$this->products
        ]);
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
