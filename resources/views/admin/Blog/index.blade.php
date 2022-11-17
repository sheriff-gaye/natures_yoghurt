@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ __('Blog') }}
                </h6>
                <div class="ml-auto">

                    <a href="{{ route('blog.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="uil uil-plus"></i>
                        </span>
                        <span class="text">{{ __('New Post') }}</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>



                        <tr class="text-center text-uppercase">
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th width='400px'>Blog Description</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 30px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog )
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($blog->blog_image)
                                <img src="{{asset('images')}}/{{$blog->blog_image}}"
                                    width="60" height="60" alt="{{ $blog->blog_title }}"  style="border-radius:50%">
                            @else
                                <span class="badge badge-primary">No image</span>
                            @endif

                                </td>
                                <td>{{$blog->blog_title}}</td>
                                <td>{!! $blog->blog_description!!}</td>
                                <td>
                                    @if ($blog->blog_status == '1')
                                <span class="btn btn-success  btn-sm">{{ __('Active')}}</span>
                            @elseif ($blog->blog_status == '0')
                                <span class="btn btn-warning btn-sm">{{__('In Active')}}</span>
                            @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-sm btn-primary">
                                            <i class="uil uil-pen"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure !')" action="{{route('blog.destroy',$blog->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ml-2 btn btn-sm btn-danger" type="submit"><i
                                                    class="uil uil-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="12">No Reviews found.</td>
                            </tr>
                            @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $blogs->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
