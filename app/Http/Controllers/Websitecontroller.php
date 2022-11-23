<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Review;
use App\Models\Staff;
use Illuminate\Http\Request;

class Websitecontroller extends Controller
{
    public function index(){
        $reviews=Review::where('review_status',1)->latest()->get();
        return view('index',compact('reviews'));
    }

    public function about(){
        $staffs=Staff::where('staff_status',1)->latest()->get();
        return view('about',compact('staffs'));
    }

    public function blog(){
        return view('blog');
    }

    public function single_post($id){
        $blog=Blog::find($id);
        return view('single_post',compact('blog'));
    }
}

