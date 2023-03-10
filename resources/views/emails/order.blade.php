@extends('layouts.checkout')



@section('checkout-content')

<link rel="stylesheet" href="{{asset('css/index.css')}}">

    <h3>Dear {{ $Name }},</h3>
    <p>We have successfully received your order, and we look forward to seeing you soon.
        <br>
        Thank you for choosing our product. We appreciate your trust and we'll do our best to meet your expectations.
    </p>

    <div class="mb-20 text-center">
        <h4>Your Order Summary</h4>
    </div>
    <div class="text-center table-responsive order_table">
        <table class="table" align="center" border="1" style="border-collapse: collapse">
            <thead class="text-center">
                <tr style="background:#c50c37;color:white">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Cart::content() as $cart)
                    <tr class="text-center">

                        <td>{{ $cart->name }}</td>
                        <td>GH₵{{ $cart->price }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->subtotal() }}</td>
                    </tr>
                @endforeach

                <tr>
                    <th>Total</th>
                    <td colspan="3" class="product-subtotal"><span
                            class="font-xl text-brand fw-900">GH₵{{ Cart::total() }}</span>
                    </td>
                </tr>

            </tbody>
        </table>
        <h5>Best regards,</h5>
        <h5>Natures Yogurt.</h5>
    </div>
@endsection
