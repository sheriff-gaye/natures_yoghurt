<div>
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <section class="search_bar">
        <div class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" id="search-item" wire:model.debounce='search' placeholder="Search Product">

            </div>
        </div>
    </section>
    <section class="products">
        {{-- <h2>Our Products</h2> --}}
        <div class="container products_container">

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/big_strawberry-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/big_vanilla_flavoured-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/big_wheat_flavoured-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/big_wheat_flavoured-min copy.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/plain_unsweeten_yoghurt-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/small_plain_unsweeten_wheat-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/small_starwberry-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>

            <article class="product">
                <div class="course_image">
                    <img src="{{ asset('images/final_prod/small_vanilla_flavoured-min.jpg') }}" alt="" />
                </div>
                <div class="product_info">
                    <h4 >Vanilla Yoghurt</h4>
                    <h4>GH₵55</h4>


                        <button type="submit" class="btn btn-primary">Add to Cart <i class="uil uil-shopping-cart"></i></button>
                </div>
            </article>





            {{-- @foreach ($products as $product)
                <article class="product">
                    <div class="course_image">
                        <img src="{{ asset('images') }}/{{ $product->product_image }}" alt="" />
                    </div>
                    <div class="product_info">
                        <h4>{{ $product->product_name }}</h4>
                        <h4>GH₵{{ $product->product_price }}</h4>
                        @if ($cart->where('id', $product->id)->count())
                            <button class="btn add">Added <i class="uil uil-shopping-bag"></i></button>
                        @else
                            <button type="submit" class="btn btn-primary"
                                wire:click='addToCart({{ $product->id }})'>Add to
                                Cart <i class="uil uil-shopping-cart"></i></button>
                        @endif
                    </div>
                </article>

            @endforeach --}}
        </div>
    </section>


    {{-- @if($products->count()<1)
    <section style="text-align:center;margin-top:-10rem">
     <div class="container">
         <h4>Oops, No Product Found! </h4>
         <h4>Try Again<i class="uil uil-sad"></i></h4>
     </div>
    </section>
    @endif --}}



</div>
