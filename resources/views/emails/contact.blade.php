@extends('layouts.checkout')

@section('checkout-content')
<h3>Dear Natures Yogurt,</h3>
<p>This is a message sent to you from the Nature's Yogurt website. Look at the information and respond as soon as you can.
</p>
<h3>Message Information</h3>
<p>Name:{{ $Name }}</p>
<p>Email: {{ $Email }}</p>
<p>Message: {{ $Message }}</p>

<h5>Best regards,</h5>
<h5>{{ $Name }}</h5>

@endsection
