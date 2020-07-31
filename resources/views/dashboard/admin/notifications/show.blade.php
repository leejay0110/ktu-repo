@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('notifications.index') }}">Notifications</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Notification Details</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">
                <i class="fas fa-bell"></i>
                New User Registered
            </h6>
        </div>


        <div class="card-body">

            <p>
    
                <a href="{{ route('admin.users.show', $notification->data['id']) }}">{{ $notification->data['name'] }}</a>
                registered {{ $notification->created_at->diffForHumans() }}
    
            </p>
    
            <h6>Roles</h6>
            
            <ul class="mb-0">
                @if ( $user->roles()->count() )
                    
                    @foreach ( $user->roles as $role)
                        <li>
                            {{ ( $role->name  == 'pep upload' ) ? 'Past Examination Paper' : 'Course Materials' }} Upload
                        </li>
                    @endforeach

                @else
                    
                    <li>
                        <p class="text-info mb-0">No role was found for this user</p>
                    </li>
                    
                @endif
            </ul>
    
            
            @if (! $approved)

                <br>

                <form action="{{ route('admin.users.approve', $notification->data['id']) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success d-block">Approve Account</button>
                </form>
            @endif

        </div>


    </div>

@endsection