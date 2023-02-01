@extends('layouts.nav')


@section('page-content')

<link rel="stylesheet" href="{{asset('css/blog.css')}}">

<section class="singlepost">
    <div class="container singlepost_container">
        <h2>{{$blog->blog_title}}</h2>
        <div class="post_author">
            <div class="post_author-avatar">
                <img src="{{asset('images/1675178454.jpeg')}}" alt="author_image">
            </div>
            <div class="post_author-info">
                <h5>Natures Yoghurt</h5>
                <small>{{$blog->created_at->diffForHumans()}}</small>
            </div>
        </div>

        <div class="singlepost_thumbnail">
            <img src="{{asset('images')}}/{{$blog->blog_image}}" alt="single_post">
        </div>

        <p>{!! $blog->blog_description !!}</p>
        <a href="{{route('blog')}}" class="btn btn-primary">Back</i></a>

    </div>
</section>
<!--single post section ends here-->

@endsection
