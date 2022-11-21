@extends('layouts.nav')

@section('page-content')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">

<section class="featured">

    <div class="container featured_container">
        <div class="post_thumbnail">
            <img src="./images/blog6.jpg" alt="blog_image_features">

        </div>
        <div class="post_info">
            <a href="post_category.html" class="category_button">Wild Life</a>
            <h2 class="post_title"><a href="post.html">Lorem ipsum dolor sit</a></h2>
            <p class="post_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem reiciendis dolore,
                consectetur perspiciatis expedita voluptatibus ipsum sint et eum veniam voluptatum ratione ipsam
                officiis iure ullam quis cupiditate voluptas voluptates!
                <a href="">Read More<i class="uil uil-arrow-right"></i></a>

            </p>

            <div class="post_author">
                <div class="post_author-avatar">
                    <img src="./images/tm4.jpg" alt="author_image">
                </div>
                <div class="post_author-info">
                    <h5>By:Sheriff Gaye</h5>
                    <small>June 15,2022 7:20 PM</small>
                </div>
            </div>

        </div>
    </div>
</section>

    <section class="posts">
        <div class="container posts_container">
            @foreach ($blogs as $blog )


            <article class="post">
                <div class="post_thumbnail">
                    <img src="{{asset('images')}}/{{$blog->blog_image}}" alt="blog_image_features">
                </div>
                <div class="post_info">
                    <a href="" class="category_button">Natures Yoghurt</a>
                    <h3 class="post_title"><a href="post.html">{{$blog->blog_title}}</a></h3>
                    <p class="post_body">{!! Str::words($blog->blog_description,'24') !!}
                        <a href="{{route('single_post',$blog->id)}}">Read More<i class="uil uil-arrow-right"></i></a>
                    </p>

                    <div class="post_author">
                        <div class="post_author-avatar">
                            <img src="./images/p6.jpg" alt="author_image">
                        </div>
                        <div class="post_author-info">
                            <h5>Natures Yoghurt</h5>
                            <small>{{$blog->created_at->diffForHumans()}}</small>
                        </div>
                    </div>

                </div>

            </article>
            @endforeach
        </div>
    </section>
@endsection
