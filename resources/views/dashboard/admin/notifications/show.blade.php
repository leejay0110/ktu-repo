@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('notifications.index') }}">Notifications</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Notification Details</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="bg-white rounded border p-4 p-lg-5">

        <h3>New User Registered</h3>

        <hr>

        <p>

            <a href="{{ route('admin.users.show', $notification->data['id']) }}">{{ $notification->data['name'] }}</a>
            registered {{ $notification->created_at->diffForHumans() }}

        </p>

        
        @if (! $active)
            <form action="{{ route('admin.users.activate', $notification->data['id']) }}" method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-success d-block">Activate User</button>
            </form>
        @endif

    </div>

@endsection