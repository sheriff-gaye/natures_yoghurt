<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogPosts extends Component
{

    public function render()
    {
        $blogs=Blog::Where('blog_status',1)->latest()->get();
        return view('livewire.blog-posts',compact('blogs'));
    }
}
