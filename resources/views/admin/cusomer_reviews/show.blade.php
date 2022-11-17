@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $review->review_name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('reviews.index') }}" class="btn btn-primary">
                        <span class="text">Back to Reviews</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td> <img src="{{ asset('images') }}/{{ $review->review_image }}" width="200" height="200"
                                    alt="{{ $review->review_name }}"></td>
                        </tr>
                        <tr>
                            <th>Review Name</th>
                            <td>{{ $review->review_name }}</td>
                            <th>Review ID</th>
                            <td>{{$review->id}}</td>

                        </tr>
                        <tr>
                            <th>Review Occupation</th>
                            <td>{{ $review->review_occupation }}</td>

                            <th>Status</th>
                            <td>
                                @if ($review->review_status == '1')
                                    <span class="btn btn-success  btn-sm">{{ __('Active') }}</span>
                                @elseif ($review->review_status == '0')
                                    <span class="btn btn-warning btn-sm">{{ __('In Active') }}</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : 'Undefined' }}</td>
                            <th>Updated At</th>
                            <td>{{ $review->updated_at ? $review->updated_at->format('Y-m-d') : 'Undefined' }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td colspan="3">{!! $review->review_description !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
