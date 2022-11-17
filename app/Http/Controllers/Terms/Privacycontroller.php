<?php

namespace App\Http\Controllers\Terms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Privacycontroller extends Controller
{
    public function privacy(){
        return view('privacy');
    }


    public function terms(){
        return view('terms');
    }

    public function returns(){
        return view('returns');
    }
}
