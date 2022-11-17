@extends('layouts.dashboard')

@section('dashboard_content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('CATEGORIES') }}
                </h6>
                <div class="ml-auto">
                    {{-- @can('category_create') --}}
                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="uil uil-plus"></i>
                        </span>
                        <span class="text">{{ __('New category') }}</span>
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>NAME</th>
                        <th>PRODUCT COUNT</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT</th>
                        <th class="text-center" style="width: 30px;">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($category->cover)
                                    <img src="{{asset('images')}}/{{$category->cover}}"
                                        width="60" height="60" alt="{{ $category->category_name }}">
                                @else
                                    <span class="badge badge-primary">No image</span>
                                @endif
                            </td>
                            <td><a href="{{ route('category.show', $category->id) }}">
                                    {{ $category->category_name }}
                                </a>
                            </td>

                            <td>{{$category->parent->count()}}</td>
                            <td>{{$category->created_at->format('Y-m-d')}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-primary">
                                        <i class="uil uil-pen"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{route('category.destroy',$category->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" ml-3 btn btn-sm btn-danger" type="submit"><i class="uil uil-trash-alt"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No categories found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    {!! $categories->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
@endsection
