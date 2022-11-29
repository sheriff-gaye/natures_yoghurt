<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testingcontroller extends Controller
{
   public function index(){

    return view('emails.order');
   }
}
