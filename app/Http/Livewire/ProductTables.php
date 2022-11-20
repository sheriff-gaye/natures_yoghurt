<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductTables extends Component
{
    public $products;
    public $carts;

    public function mount(){
        $this->products=Products::all()->where('product_status',1);
        $this->carts = Cart::content();
    }
    public function render()
    {
        return view('livewire.product-tables');
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


}
