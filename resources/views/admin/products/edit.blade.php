@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="mb-4 shadow card">
            <div class="py-3 card-header d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Update Product') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Back to products') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="product_name" value="{{ old('product_name',$product->product_name) }}">
                                @error('product_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control" id="price" type="number" name="product_price" value="{{ old('product_price',$product->product_price) }}">
                                @error('product_price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control" id="quantity" type="number" name="product_quantity" value="{{ old('product_quantity',$product->product_quantity) }}">
                                @error('product_quantity')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">- Select category -</option>
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}"  {{ old('category_id') || $product->category_id == $category->id ? 'selected' : null }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror

                                </select>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="product_status" id="status" class="form-control">
                                    <option value="">- Select Status-</option>
                                    <option value="1" {{ old('product_status' )|| $product->product_status == "1" ? 'selected' : null }}>Active</option>
                                    <option value="0" {{ old('product_status')|| $product->product_status == "0" ? 'selected' : null }}>Inactive</option>
                                </select>
                                @error('product_status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="description" class="text-small text-uppercase">{{ __('Description') }}</label>
                            <textarea name="product_description" rows="3" class="form-control summernote">{!! old('product_description',$product->product_description) !!}</textarea>
                            @error('product_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="images">{{ __('images') }}</label>
                            @if($product->product_image)
                            <img
                                class="mb-2"
                                src="{{asset('images')}}/{{$product->product_image}}"
                                alt="{{ $product->product_name }}" width="100" height="100">
                        @else
                            <img
                                class="mb-2"
                                src="{{ asset('images') }}/{{$product->product_image}}" alt="{{ $product->product_name }}" width="60" height="60">
                        @endif
                            <br>
                            <div>
                                <input type="file" name="product_image" id="product-images" class="file-input-overview" multiple>
                            </div>
                            @error('product_image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="pt-4 form-group">
                        <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endpush

@push('script-alt')
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            // summernote


            // upload images
            $("#product-images").fileinput({
                theme: "fas",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });


            // select2
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $(".select2").select2({
                tags: true,
                closeOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });
        })
    </script>
@endpush

