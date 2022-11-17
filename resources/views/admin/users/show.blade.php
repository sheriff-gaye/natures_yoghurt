@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h5 class="m-0 font-weight-bold text-primary text-uppercase">
                    {{ $user->name }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <span class="text">Back to Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>User Name</th>
                            <td>{{ $user->name }}</td>
                            <th>User Email</th>
                            <td>{{$user->email}}</td>

                        </tr>
                        <tr>
                            <th>Last Login</th>
                            <td>{{ \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}</td>
                            <th>Last Login IP</th>
                            <td>{{$user->last_login_ip}}</td>

                        </tr>

                        @if ($user->name==Auth::user()->name)
                        <tr>


                            <th></th>
                            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Change Password <i class="uil uil-key-skeleton-alt"></i></a></td>
                            <th>
                                <form action="{{route('users.destroy',$user->id)}}" method="POST"  onclick="return confirm('are you sure !')">
                                @csrf
                                @method('DELETE')
                                <button href="" class="btn btn-danger">Delete Account <i class="uil uil-trash-alt"></i></button>
                                </form>
                            </th>
                            <td></td>

                        <td></td>


                        </tr>
                        @else

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
