@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Update Review') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('reviews.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Back to Reviews') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('reviews.update', $review->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="review_name">Review Name</label>
                                <input class="form-control" id="review_name" type="text" name="review_name"
                                    value="{{ old('review_name', $review->review_name) }}">
                                @error('review_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="review_occupation">Review Occupation</label>
                                <input class="form-control" id="review_occupation" type="text" name="review_occupation"
                                    value="{{ old('review_occupation', $review->review_occupation) }}">
                                @error('review_occupation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="review_status">Review Status</label>
                                <select name="review_status" id="review_status" class="form-control">
                                    <option value="">- Select Status-</option>
                                    <option value="1" {{ old('review_status') || $review->review_status == "1" ? 'selected' : null }}>Active
                                    </option>
                                    <option value="0" {{ old('review_status') || $review->review_status == "0"? 'selected' : null }}>Inactive
                                    </option>
                                </select>
                                @error('review_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="review_description" class="text-small">{{ __('Review Description') }}</label>
                                <textarea name="review_description" rows="3" class="form-control summernote">{!! old('review_description', $review->review_description) !!}</textarea>
                                @error('review_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <label for="images">{{ __('Review Images') }}</label>
                            @if ($review->review_image)
                                <img class="mb-2" src="{{ asset('images') }}/{{ $review->review_image }}"
                                    alt="{{ $review->review_name }}" width="100" height="100">
                            @else
                            @endif
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="review_image" id="product-images"
                                        class="file-input-overview" multiple="multiple">
                                </div>
                                @error('review_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group pt-4">
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
        $(function() {
            // summernote
            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],

                ]
            })

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
                $.each(data.children, function(idx, child) {
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
