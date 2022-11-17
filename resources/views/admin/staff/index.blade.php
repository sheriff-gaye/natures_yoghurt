@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('NATURES TEAM') }}
                </h6>
                <div class="ml-auto">

                    <a href="{{ route('staff.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="uil uil-plus"></i>
                        </span>
                        <span class="text">{{ __('New Team Member') }}</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>

                        <tr class="text-center text-uppercase">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Occupation</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($staffs as $staff)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($staff->staff_image)
                                        <img src="{{ asset('images') }}/{{ $staff->staff_image }}" width="60"
                                            height="60" alt="{{ $staff->staff_name }}" style="border-radius:50%">
                                    @else
                                        <span class="badge badge-primary">No image</span>
                                    @endif

                                </td>
                                <td><a href="{{route('staff.show',$staff->id)}}">{{$staff->staff_name}}</a></td>
                                <td>{{$staff->staff_occupation}}</td>
                                <td>{{$staff->created_at->format('Y-m-d')}}</td>
                                <td>{{$staff->updated_at->diffForHumans()}}</td>
                                <td>
                                    @if ($staff->staff_status == '1')
                                        <span class="btn btn-success  btn-sm">{{ __('Active') }}</span>
                                    @elseif ($staff->staff_status == '0')
                                        <span class="btn btn-warning btn-sm">{{ __('In Active') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('staff.edit',$staff->id)}}" class="btn btn-sm btn-primary">
                                            <i class="uil uil-pen"></i>
                                        </a>
                                        <form onclick="return confirm('are you sure !')" action="{{route('staff.destroy',$staff->id)}}" method="POST">
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
                                    {!! $staffs->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
