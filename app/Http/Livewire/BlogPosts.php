<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogPosts extends Component
{
    public $search;
    protected $queryString=['search'];

    public function render()
    {
        $blogs=Blog::where('blog_title','like',"%{$this->search}%")
        ->orwhere('blog_description','like',"%{$this->search}%")
        ->where('blog_status',1)->latest()->get();
        return view('livewire.blog-posts',compact('blogs'));
    }
}
