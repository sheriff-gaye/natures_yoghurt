<div>

<section class="search_bar">
    <div class="container search_bar-container">
        <div>
            <i class="uil uil-search"></i>
            <input type="text" id="search-item"  wire:model='search' placeholder="Search Product">

        </div>

        <button type="submit" class="btn" wire:click='searchBtn'>Search</button>
    </div>

</section>
<section class="courses">
    <h2 id="search_msg">No Product Found</h2>

    <div class="container courses_container" id="product-list">
        @forelse ($products as $product)
            <article class="course">

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

                    <button class="btn btn-added">Added</button>

                    @else
                        <button type="submit" class="btn btn-primary" wire:click='addToCart({{$product->id}})'>Add to
                            Cart</button>
                    @endif

                </div>

            </article>

            @empty

            <h4 style="margin:0 auto">No Product Currently in Store</h4>

        @endforelse


    </div>


</section>


</div>
