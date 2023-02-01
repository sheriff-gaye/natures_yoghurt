    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="mb-4 d-sm-flex align-items-center justify-content-between">
            <h1 class="mb-0 text-gray-800 h3">{{ __('Administrators') }}</h1>
            {{-- <a href="{{route('users.create')}}" class="shadow-sm btn btn-primary btn-sm">{{ __('create new')}} <i class="fa fa-plus"> </i></a> --}}
        </div>

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th>{{__('NO')}}</th>
                                <th>{{ __('NAME') }}</th>
                                <th>{{ __('EMAIL') }}</th>
                                <th>{{ __('CREATED AT') }}</th>
                                <th>{{__('ACTION')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>


                                    <td>
                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-info">
                                            <i class="uil uil-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {!! $users->appends(request()->all())->links() !!}

            </div>
        </div>
        <!-- Content Row -->

    </div>
