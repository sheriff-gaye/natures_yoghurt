<?php

namespace App\Http\Livewire;

use App\Mail\OrderReceived;
use App\Mail\Testmail;
use App\Models\Orders;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class Checkout extends Component
{
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

        // $this->validate();

        $values =([
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

        // Orders::create($values);
        // Cart::destroy();
        // $this->emit('cart_updated');
        // Mail::to($this->email)->send(new OrderReceived($this->full_name,$this->email,$this->address));
        // return redirect()->route('shop');

        dd($this->full_name);


    }

    public function updated($property){

        $this->validateOnly($property);
    }


}
