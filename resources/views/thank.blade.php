@extends('layouts.nav')

@section('page-content')
    <section style="text-align: center">
        <div class="container">
            <div class="text-center col-md-12">
                <h3>Thank you for your order</h3>
                <p>A confirmation email was sent.</p>
                <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continue Shopping</a>
            </div>
        </div>
    </section>
@endsection
