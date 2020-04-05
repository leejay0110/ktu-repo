@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>

@endsection

@section('content')

    
    <h1 class="display-4 mb-5">Notifications</h1>


    


    @if ( Auth::user()->notifications->count())


        <form action="{{ route('notifications.mark-as-read') }}" method="post">
        

            @csrf
            @method('put')

            <button type="submit" class="btn btn-secondary btn-block mb-5">Mark all as read</button>

        </form>


        <div class="table-responsive">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Notification</th>
                        <th>Read</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Auth::user()->notifications as $notification)
                    
                        <tr>
                            <td>
                                <a href="{{ route('admin.users.show', $notification->data['id']) }}">{{ $notification->data['name'] }}</a>
                                registered {{ $notification->created_at->diffForHumans() }}
                            </td>
                            <td>
                                @if ($notification->read_at)
                                    {{ $notification->read_at->isoFormat('LLL') }}
                                @else
                                    <strong>not read</strong>
                                @endif
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
    
            </table>

        </div>


        <form action="{{ route('notifications.delete') }}" method="post">
            
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-danger btn-block mt-5">Delete All Notifications</button>

        </form>

        
    @else
    
        <p class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            No notification found.
        </p>

    @endif


@endsection