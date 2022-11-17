@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $category->category_name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('category.index') }}" class="btn btn-primary">
                        <span class="text">Back to categories</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Update at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $category->category_name  }}</td>
                        <td>{{ $category->created_at  ? $category->created_at->format('Y-m-d') : 'Undefined'}}</td>
                        <td>{{$category->updated_at  ? $category->created_at->format('Y-m-d') : 'Undefined'}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
