@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="mb-4 shadow card">
            <div class="py-3 card-header d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('ORDERS') }}
                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center text-uppercase">
                            <th>NO</th>
                            <th>NAME</th>
                            <TH>EMAIL</TH>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                            <th>PAYMENT</th>
                            <th>QTY</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $key=>$order)
                            <tr class="text-center">
                                <td>{{ $key +1  }}</td>
                                <td><a href="{{ route('orders.show', $order->id) }}">{{$order->full_name}}</td></td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>

                                <td>{{$order->payment}}</td>
                                <td>
                                    11
                                </td>
                                <td>$33</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $orders->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
