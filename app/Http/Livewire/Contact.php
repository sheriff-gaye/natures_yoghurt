<?php

namespace App\Http\Livewire;

use App\Mail\ContactAdmin;
use Livewire\Component;
use App\Models\ContactMe;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $full_name;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.contact');
    }

    protected $rules=[
        'full_name'=>'required',
        'email'=>'required|email',
        'message'=>'required'
    ];

    public function send(){
        $this->validate();
        $values =([
            "full_name"=>$this->full_name,
            "email"=>$this->email,
            "message"=>$this->message,
        ]);

        ContactMe::create($values);
        Mail::to($this->email)->send(new ContactAdmin(
            $this->full_name,
            $this->email,
            $this->message
        ));

        $this->full_name='';
        $this->email='';
        $this->message='';

    }

    public function updated($property){

        $this->validateOnly($property);
    }
}
