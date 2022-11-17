@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Create Review') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{route('blog.index')}}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Back to Reviews') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('blog.store')}}"  enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="blog_title">Blog Title</label>
                                <input class="form-control" id="blog_title" type="text" name="blog_title" value="{{ old('blog_title') }}">
                                @error('blog_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="blog_status">Blog Status</label>
                                <select name="blog_status" id="blog_status" class="form-control">
                                    <option value="">- Select Status-</option>
                                    <option value="1" {{ old('blog_status') == "1" ? 'selected' : null }}>Active</option>
                                    <option value="0" {{ old('blog_status') == "0" ? 'selected' : null }}>Inactive</option>
                                </select>
                                @error('blog_status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="blog_description" class="text-small">{{ __('Blog Description') }}</label>
                            <textarea name="blog_description" rows="3" class="form-control summernote">{!! old('blog_description') !!}</textarea>
                            @error('blog_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <label for="images">{{ __('Blog Image') }}</label>
                            <br>
                            <div class="file-loading">
                                <input type="file" name="blog_image" id="product-images" class="file-input-overview" multiple="multiple">
                            </div>
                            @error('blog_image')<span class="text-danger">{{ $message }}</span>@enderror
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
        $(function () {
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

