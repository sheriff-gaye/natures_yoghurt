<div>

    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

    <section id="cart-container" class="container">

        <h2>Shopping Cart</h2>
        <table width="100%" id="table" style="border: 1px solid gray">
            <thead>

                <tr>

                    <th>IMAGE</th>
                    <th>PRODUCT</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carts as $cart)
                    <tr>
                        @foreach ($products as $product)
                            @if ($product->id == $cart->id)
                                <td><img src="{{ asset('images') }}/{{ $product->product_image }}" alt=""></td>
                            @else
                            @endif
                        @endforeach
                        <td>{{ $cart->name }}</td>
                        <td>GH₵{{ $cart->price }}</td>
                        <td class="qty">

                            <button wire:click='increase("{{ $cart->rowId }}")'><i class="uil uil-plus"></i></button>
                            <span> {{ $cart->qty }}</span>

                            <button  wire:click='decrease("{{ $cart->rowId }}")'><i class="uil uil-minus"></i></button>
                        </td>

                        <td>GH₵{{ $cart->subtotal }}</td>
                        <td>

                            <button style="background: transparent"  wire:click='destroy("{{ $cart->rowId }}")'><i class="uil uil-trash-alt"></i></button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No Item In Cart</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </section>

    <section class="container cupon_container">
       <div>
        @if($carts->count()>=1)
        <a class="btn btn-primary" wire:click='clear'>Clear Cart</a>
    </div>

        <div class="total">
            <div class="total-details">
                <h5>CARD TOTAL</h5>
                <p><b>TOTAL<span>GH₵{{ Cart::total() }}</span></b></p>
                <a href="" class="btn btn-primary">Proceed to Payment</a>
            </div>
        </div>
        @endif
    </section>



</div>
