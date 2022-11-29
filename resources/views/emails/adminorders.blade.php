@extends('layouts.checkout')



@section('checkout-content')
    <h3>Dear Natures Yogurt,</h3>
    <p>Customer name {{$Name}} has placed an order for the item listed below. Confirm everything thoroughly and get back to
        them . we have sent {{$Name}} an automatic order received confirmation message.
    </p>
    <h4>CUSTOMER DETAILS</h4>
    <p>NAME : {{$Name}}</p>
    <p>EMAIL: {{$Email}}</P>
    <p>PHONE: {{$Phone}}</p>
    <p>ADDRESS: {{$Address}}</p>
    <p>CITY: {{$City}}</p>
    <p>PAYMENT METHOD: {{$Payment}}</p>
    @if($Info)
    <p>ADDITIONAL INFO: {{$Info}}</p>
    @endif


    <div class="mb-20 ">
        <h4><span class="uppercase">{{$Name}}'s</span> ORDER SUMMARY</h4>
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
    </div>
@endsection
