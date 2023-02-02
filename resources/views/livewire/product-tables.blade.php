<div>

    <style>
        @media screen and (max-width:600px) {
            .courses{
                margin-top: 4rem;

            }
        }
    </style>

    <section class="search_bar">
        <div class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" id="search-item" wire:model.debounce='search' placeholder="Search Product">

            </div>
        </div>
    </section>

    {{-- <section class="courses">

       <div class="container courses_container" id="product-list">
            @forelse ($products as $product)
                <article class="course" wire:loading.class='muted'>

                    <div class="course_image">
                        <img src="{{ asset('images') }}/{{ $product->product_image }}" class="pic" />
                    </div>
                    <div class="course_info">
                        <div class="review">
                            <a><i class="uis uis-star"></i></a>
                            <a><i class="uis uis-star"></i></a>
                            <a><i class="uis uis-star"></i></a>
                            <a><i class="uis uis-star"></i></a>
                            <a><i class="uis uis-star-half-alt"></i></a>

                        </div>
                        <h4>{{ $product->product_name }}</h4>

                        <h3>GH₵{{ $product->product_price }}</h3>
                        @if ($cart->where('id', $product->id)->count())
                            <button class="btn" style="background:#008080;color:white;border:none ">Added <i class="uil uil-shopping-bag"></i></button>
                        @else
                            <button type="submit" class="btn btn-primary"
                                wire:click='addToCart({{ $product->id }})'>Add to
                                Cart <i class="uil uil-shopping-cart"></i></button>
                        @endif

                    </div>

                </article>

            @empty

                <h3 id="search_msg">Oops, No Results Found! <i class="uil uil-sad"></i></h3>

            @endforelse


        </div>


    </section> --}}



    <section class="courses">
        {{-- <h2>Our Popular Courses</h2> --}}
        <div class="container courses_container" style="margin-top: -10rem">
            @foreach ($products as $product)
                <article class="course">
                    <div class="course_image">
                        <img src="{{ asset('images') }}/{{ $product->product_image }}" alt="" />
                    </div>
                    <div class="course_info" style="padding:2rem">
                        <h4>{{ $product->product_name }}</h4>
                        <h5 style="color: white">GH₵{{ $product->product_price }}</h5>
                        @if ($cart->where('id', $product->id)->count())
                            <button class="btn" style="background:#170791;color:white;border:none ">Added <i
                                    class="uil uil-shopping-bag"></i></button>
                        @else
                            <button type="submit" class="btn btn-primary"
                                wire:click='addToCart({{ $product->id }})'>Add to
                                Cart <i class="uil uil-shopping-cart"></i></button>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>



</div>
