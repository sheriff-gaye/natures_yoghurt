@extends('layouts.nav')

@section('page-content')
<link rel="stylesheet" href="{{asset('css/blog.css')}}">

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
