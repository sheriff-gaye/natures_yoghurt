<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class ProductTables extends Component
{

    public $products;
    public function mount(){
        $this->products=Products::all()->where('product_status',1);

    }

    public function render()
    {
        $cart= Cart::content();
        return view('livewire.product-tables',compact('cart'));
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
