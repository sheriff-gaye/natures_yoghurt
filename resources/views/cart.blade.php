
@extends('layouts.nav')


@section('page-content')

<link rel="stylesheet" href="{{asset('css/cart.css')}}">

<section id="cart-container" class="container">

    <h2>Shopping Cart</h2>
    <table width="100%"  id="table" style="border: 1px solid gray">
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
        @forelse ($carts as $cart )
        <tr>
          @foreach ($products as $product )
          @if($product->id==$cart->id)
          <td><img src="{{ asset('images') }}/{{ $product->product_image }}" alt=""></td>
          @else
          @endif
          @endforeach
          <td>{{$cart->name}}</td>
          <td>GH₵{{$cart->price}}</td>
            <td  class="qty">
                <form action="{{route('increase',$cart->rowId)}}" method="POST">
                    @csrf
                    <button><i class="uil uil-plus"></i></button>
                </form>
                {{$cart->qty}}
               <form action="{{route('decrease',$cart->rowId)}}" method="POST">
                @csrf
                <button><i class="uil uil-minus"></i></button>
               </form>
            </td>

          <td>GH₵{{$cart->subtotal}}</td>
          <td>
            <form action="{{route('cart.destroy',$cart->rowId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button style="background: transparent"><i class="uil uil-trash-alt"></i></button>
        </form>
        </td>
        </tr>
        @empty
        <h4 style="position:absolute;margin-top:4rem;">No Products In Cart</h4>
        @endforelse

      </tbody>
    </table>
  </section>
<input type="button" value="">

  <section class="container cupon_container">
    <div class="total">
      <div class="total-details">
        <h5>CARD TOTAL</h5>
        <p><b>TOTAL<span>GH₵{{Cart::total()}}</span></b></p>
        <a href="{{route('payment')}}" class="btn btn-primary">Proceed to Payment</a>
      </div>
    </div>
  </section>

  @endsection
