<?php

namespace App\Http\Livewire;
use app\Models\Contact;
use Livewire\Component;

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
        'email'=>'required',
        'message'=>'required'
    ];

    public function send(){
        $this->validate();
        $values =([
            "full_name"=>$this->full_name,
            "email"=>$this->email,
            "message"=>$this->message,
        ]);

        Contact::create($values);


       
    }
}
