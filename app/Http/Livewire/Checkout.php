<?php

namespace App\Http\Livewire;

use App\Mail\AdminOrders;
use App\Models\Orders;
use Livewire\Component;
use App\Mail\OrderReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout extends Component
{

    public $productname;
    public $price;
    public $qty;
    public $total;
    public $full_name;
    public $address;
    public $city;
    public $phone;
    public $email;
    public $info;
    public $payment;

    protected $rules=[
        'full_name'=>'required',
        'address'=>'required',
        'city'=>'required',
        'phone'=>'required',
        'email'=>'required|email',
        'payment'=>'required',
        'info'=>'max:30'
    ];

    public function render()
    {

        $carts=Cart::content();
        return view('livewire.checkout',compact('carts'));
    }


    public function order(){

        $this->validate();
        $values =([
            "productname"=>$this->productname,
            "price"=>$this->price,
            "qty"=>$this->qty,
            "total"=>$this->total,
            "full_name"=>$this->full_name,
            "address"=>$this->address,
            "city"=>$this->city,
            "phone"=>$this->phone,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "email"=>$this->email,
            "payment"=>$this->payment,
            "info"=>$this->info
        ]);

        Orders::create($values);
        Mail::to($this->email)->send(new OrderReceived(
            $this->full_name,
            $this->email,
            $this->address
        ));
        Mail::to('naturesyoghurt@gmail.com')->send(new AdminOrders(
            $this->full_name,
            $this->email,
            $this->address,
            $this->city,
            $this->phone,
            $this->payment,
            $this->info
        ));

        Cart::destroy();
        $this->emit('cart_updated');
        return redirect()->route('thanks');




    }

    public function updated($property){

        $this->validateOnly($property);
    }


}
