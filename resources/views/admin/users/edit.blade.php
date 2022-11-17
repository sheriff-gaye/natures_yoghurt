@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Update Account') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{route('home')}}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Back to Dashboard') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('users.update',$user->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input class="form-control" id="blog_title" type="text" name="name"
                                    value="{{ old('name', $user->name) }}" readonly>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">User Email </label>
                                <input class="form-control" id="email" type="text" name="email"
                                    value="{{ old('email', $user->email) }}" readonly>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="password">Old Password</label>
                                <input class="form-control" id="password" type="password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input class="form-control" id="new_password" type="password" name="new_password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input class="form-control" id="new_password_confirmation" type="password" name="new_password_confirmation">
                                @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    {{-- <div class="row">
                        <div class="col-12">
                            <label for="images">{{ __('Blog Image') }}</label>
                            {{-- @if ($blog->blog_image)
                                <img class="mb-2" src="{{ asset('images') }}/{{ $blog->blog_image }}"
                                    alt="{{ $blog->blog_title}}" width="100" height="100">
                            @else
                            @endif --}}
                            {{-- <br>
                            <div class="file-loading">
                                <input type="file" name="user_avatar" id="product-images" class="file-input-overview"
                                    multiple="multiple">
                            </div>
                            @error('user_avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

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
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
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
