<div>

    <section class="search_bar">
        <div class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" id="search-item" wire:model.debounce='search' placeholder="Search Product">

            </div>
        </div>
    </section>

    <section class="courses">

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


    </section>


</div>
