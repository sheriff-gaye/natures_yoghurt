

<div>
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <h3 class="text-center uppercase">Shopping Cart</h2>
                            <table class="table text-center shopping-summery clean" style="border:1px solid gray">
                                <thead>
                                    <tr class="main-heading" style="background: #c50c37;color:white">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carts as $cart)
                                        <tr>
                                            @foreach ($products as $product)
                                                @if ($product->id == $cart->id)
                                                    <td class="image"><img
                                                            src="{{ asset('images') }}/{{ $product->product_image }}"
                                                            alt="#"></td>
                                                @endif
                                            @endforeach
                                            <td class="product-des">
                                                <h5 class="product-name"><a href="product-details.html"
                                                        style="color: #2C3946">{{ $cart->name }} </a></h5>
                                            </td>
                                            <td class="price" data-title="Price"><span>GH₵{{ $cart->price }} </span>
                                            </td>
                                            <td class="text-center" data-title="Stock">
                                                <div class="m-auto border detail-qty radius">
                                                    <a class="qty-down" title="Decrease Quantity"
                                                        wire:click='decrease("{{ $cart->rowId }}")'><i
                                                            class="fi-rs-angle-small-down"></i></a>
                                                    <span class="qty-val">{{ $cart->qty }}</span>
                                                    <a class="qty-up" title="Increase Quantity"
                                                        wire:click='increase("{{ $cart->rowId }}")'><i
                                                            class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span>GH₵{{ $cart->subtotal() }}</span>
                                            </td>
                                            <td class="action"><a class="text-muted" title="Delete Product"  wire:click='destroy("{{ $cart->rowId }}")'><i
                                                        class="fi-rs-trash" style="color: #c50c37"></i></a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No Item in Cart</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="mr-10 btn mb-sm-15" wire:click='clear' style="background:#c50c37;border:none"><i
                                class="mr-10 fi-rs-shuffle"></i>Clear Cart</a>
                        <a class="btn" href="{{ route('shop') }}" style="background:#c50c37;border:none"><i
                                class="mr-10 fi-rs-shopping-bag"></i>Continue Shopping</a>
                    </div>
                    @if ($carts->count() >= 1)
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="mb-3 heading_s1">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td>Total</td>
                                                <td class="text-black font-xl fw-900 text-brand">GH₵{{ Cart::total() }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{route('checkout')}}" class="btn " style="background:#c50c37;border:none"> <i
                                        class="mr-10 fi-rs-box-alt"></i> Proceed
                                    To CheckOut</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
</div>
</section>

</div>
