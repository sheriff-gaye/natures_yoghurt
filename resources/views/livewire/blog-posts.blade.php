<div>
    <section class="search_bar">
        <div class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" id="search-item"  placeholder="Search" wire:model.debounce='search'>

            </div>
        </div>
    </section>


    <section class="posts">
        <div class="container posts_container">
            @forelse ($blogs as $blog)
                <article class="post">
                    <div class="post_thumbnail">
                        <img src="{{ asset('images') }}/{{ $blog->blog_image }}" alt="blog_image_features">
                    </div>
                    <div class="post_info">
                        <a href="" class="category_button">Natures Yoghurt</a>
                        <h3 class="post_title"><a href="post.html">{{ $blog->blog_title }}</a></h3>
                        <p class="post_body">{!! Str::words($blog->blog_description,10,'...') !!}</p>
                        <a href="{{ route('single_post', $blog->id) }}" class="read_more">Read More<i class="uil uil-arrow-right"></i></a>


                        <div class="post_author">
                            <div class="post_author-avatar">
                                <img src="./images/p6.jpg" alt="author_image">
                            </div>
                            <div class="post_author-info">
                                <h5>Natures Yoghurt</h5>
                                <small>{{ $blog->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                    </div>

                </article>
                @empty
                <h4 id="search_msg">Oops, No Results Found! <i class="uil uil-sad"></i></h4>
            @endforelse
        </div>
    </section>
</div>
