<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Review;
use App\Models\Staff;
use Illuminate\Http\Request;

class Websitecontroller extends Controller
{
    public function index(){
        $reviews=Review::all()->where('review_status',1);
        return view('index',compact('reviews'));
    }

    public function about(){
        $staffs=Staff::all()->where('staff_status',1);
        return view('about',compact('staffs'));
    }

    public function blog(){
        $blogs=Blog::all()->where('blog_status',1);
        return view('blog',compact('blogs'));
    }

    public function single_post($id){
        $blog=Blog::find($id);
        return view('single_post',compact('blog'));
    }
}

