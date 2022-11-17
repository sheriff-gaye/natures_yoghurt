@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $product->product_name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <span class="text">Back to products</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->product_name }}</td>
                            <th>Price</th>
                            <td>GH₵{{ $product->product_price }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $product->product_quantity }}</td>
                            <th>Status</th>
                            <td>
                                @if ($product->product_status == '1')
                                    <span class="btn btn-success  btn-sm">{{ __('Active') }}</span>
                                @elseif ($product->product_status == '0')
                                    <span class="btn btn-warning btn-sm">{{ __('In Active') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>

                            <th>Category</th>
                            <td>{{$product->category->category_name}}</td>
                            <th>Admin</th>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $product->created_at ? $product->created_at->format('Y-m-d') : 'Undefined' }}</td>
                            <th>Updated At</th>
                            <td>{{ $product->updated_at ? $product->updated_at->format('Y-m-d') : 'Undefined' }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td colspan="3">{!! $product->product_description !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
