@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('PRODUCTS') }}
                </h6>
                <div class="ml-auto">

                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="uil uil-plus"></i>
                        </span>
                        <span class="text">{{ __('New product') }}</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center text-uppercase">
                            <th>NO</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>QUANTITY</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 30px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($product->product_image)
                                        <img src="{{ asset('images') }}/{{ $product->product_image }}" width="60"
                                            height="60" alt="{{ $product->product_name }}">
                                    @else
                                        <span class="badge badge-primary">No image</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->product_name }}</a>
                                </td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>GH₵{{ number_format($product->product_price) }}</td>

                                <td>{{$product->category->category_name}}</td>
                                <td>{{$product->created_at->format('Y-m-d')}}</td>
                                <td>{{$product->updated_at->diffForHumans()}}</td>
                                <td>
                                    @if ($product->product_status == '1')
                                        <span class="btn btn-success  btn-sm">{{ __('Active')}}</span>
                                    @elseif ($product->product_status == '0')
                                        <span class="btn btn-warning btn-sm">{{__('In Active')}}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                            <i class="uil uil-pen"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure !')"
                                            action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ml-1 btn btn-sm btn-danger" type="submit"><i
                                                    class="uil uil-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
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
                                    {!! $products->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
