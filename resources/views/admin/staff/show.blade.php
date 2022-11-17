@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $staff->staff_name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('reviews.index') }}" class="btn btn-primary">
                        <span class="text">Back to Staff</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td> <img src="{{ asset('images') }}/{{ $staff->staff_image }}" width="200" height="200"
                                    alt="{{ $staff->staff_name }}"></td>
                        </tr>
                        <tr>
                            <th>Staff Name</th>
                            <td>{{ $staff->staff_name }}</td>
                            <th>Review ID</th>
                            <td>{{$staff->id}}</td>

                        </tr>
                        <tr>
                            <th>Staff Occupation</th>
                            <td>{{ $staff->staff_occupation }}</td>

                            <th>Status</th>
                            <td>
                                @if ($staff->staff_status == '1')
                                    <span class="btn btn-success  btn-sm">{{ __('Active') }}</span>
                                @elseif ($staff->staff_status == '0')
                                    <span class="btn btn-warning btn-sm">{{ __('In Active') }}</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $staff->created_at ? $staff->created_at->format('Y-m-d') : 'Undefined' }}</td>
                            <th>Updated At</th>
                            <td>{{ $staff->updated_at ? $staff->updated_at->format('Y-m-d') : 'Undefined' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
