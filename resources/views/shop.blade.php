@extends('layouts.nav')

@section('page-content')

<section class="search_bar">
    <form class="container search_bar-container" action="">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" id="search-item" placeholder="Search Product">
        </div>
        <button type="submit" class="btn">Search</button>
    </form>
</section>
<!--our popular courses-->

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
                        <a href=""><i class="uis uis-star"></i></a>
                        <a href=""><i class="uis uis-star"></i></a>
                        <a href=""><i class="uis uis-star"></i></a>
                        <a href=""><i class="uis uis-star"></i></a>
                        <a href=""><i class="uis uis-star-half-alt"></i></a>

                    </div>
                    <h4>{{ $product->product_name }}</h4>


                    <h3>GH₵{{ $product->product_price }}</h3>
                    @if ($cart->where('id', $product->id)->count())
                        <button class="btn btn-primary">In Cart</button>
                    @else
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    @endif

                </div>

            </article>
            @empty
            <h4>No Product In Store</h4>
        @endforelse

    </div>
</section>

@endsection
