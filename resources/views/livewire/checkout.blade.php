<div>
    @if ($carts->count() >= 1)
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Transaction Details</h4>
                            </div>
                            <form method="post">


                                <div class="form-group">
                                    <input type="text"  name="full_name" placeholder="Full Name"
                                        class="@error('full_name') border-danger @enderror" wire:model='full_name'>
                                    @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>

                                <div class="form-group">
                                    <input type="text" name="address" placeholder="Address"
                                        class="@error('address') border-danger @enderror" wire:model='address'>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="city" placeholder="City"
                                        class="@error('city') border-danger @enderror" wire:model='city'>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone"
                                        class="@error('phone') border-danger @enderror" wire:model='phone'>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email address"
                                        class="@error('email') border-danger @enderror" wire:model='email'>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-20">
                                    <h5>Additional information</h5>
                                </div>
                                <div class="form-group mb-30">
                                    <textarea cols="1" placeholder="additional message" style="resize: none" wire:model='info'></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Order Summary</h4>
                                </div>
                                <div class="text-center table-responsive order_table">
                                    <table class="table">
                                        <thead>
                                            <tr style="background:#c50c37;color:white">
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($carts as $cart)
                                                <tr>

                                                    <td class="image product-thumbnail">{{ $cart->name }}</td>
                                                    <td>GH₵{{ $cart->price }}</td>
                                                    <td>{{ $cart->qty }}</span></td>
                                                    <td>{{ $cart->subtotal() }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No Item Added to Cart</td>
                                                </tr>
                                            @endforelse

                                            <tr>
                                                <th>Total</th>
                                                <td colspan="3" class="product-subtotal"><span
                                                        class="font-xl text-brand fw-900">GH₵{{ Cart::total() }}</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Payment</h5>
                                    </div>

                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment"
                                                id="exampleRadios3" wire:model='payment' value="cash">
                                            <label class="form-check-label" for="exampleRadios3"
                                                data-bs-toggle="collapse" data-target="#cashOnDelivery"
                                                aria-controls="cashOnDelivery">Cash On
                                                Delivery</label>
                                        </div>

                                        <div class="custome-radio">

                                            <input class="form-check-input" type="radio" name="payment"
                                                id="exampleRadios4" value="momo" wire:model='payment'>

                                            <label class="form-check-label" for="exampleRadios4"
                                                data-bs-toggle="collapse" data-target="#cardPayment"
                                                aria-controls="cardPayment" href="#collapsePassword">MOMO</label>
                                        </div>

                                        <div id="collapsePassword" class="form-group create-account collapse in">
                                            <input required="" type="password" placeholder="Password"
                                                name="password">
                                        </div>

                                        @error('payment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <a class="btn btn-fill-out btn-block mt-30" style="background:#c50c37;border:none"
                                    wire:click='order'>Place
                                    Order</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif
</div>
