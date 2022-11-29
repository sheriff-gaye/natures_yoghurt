@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="mb-4 shadow card">
            <div class="py-3 card-header d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $orders->full_name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">
                        <span class="text">Back to Orders</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $orders->full_name }}</td>
                            <th>Email</th>
                            <td>{{ $orders->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $orders->phone }}</td>
                            <th>Address</th>
                            <td>{{$orders->address}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$orders->city}}</td>
                            <th>Payment Method</th>
                            <td>{{$orders->payment}}</td>

                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $orders->created_at ? $orders->created_at->format('Y-m-d') : 'Undefined' }}</td>
                            <th>Order Time</th>
                            <td>{{ $orders->created_at ? $orders->created_at->format('H:m:s') : 'Undefined' }}</td>
                        </tr>

                        @if($orders->info !=Null)
                        <tr>
                            <th>Description</th>
                            <td colspan="3">{{ $orders->info }}</td>

                        </tr>

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
