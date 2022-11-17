<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Logoutcontroller extends Controller
{
    public function index(){

        Auth::logout();
        return redirect()->route('login');

    }
}
