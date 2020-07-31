@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>

@endsection

@section('content')


    @if ( Auth::user()->notifications->count() )
        
        <div class="my-5">
        

            @if ( Auth::user()->unreadNotifications->count() )

                <form class="d-inline" action="{{ route('notifications.mark-all-as-read') }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-blue d-block d-lg-inline mb-3 mb-lg-0">Mark all as read</button>
                </form>

            @endif

        
            <form class="d-inline" action="{{ route('notifications.delete') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-blue">Delete all notifications</button>
            </form>
        
        </div>

    @endif



    <div class="card my-5">


        <div class="card-header">
            <h6 class="mb-0">
                Notifications
                <span class="badge badge-pill badge-dark">
                    {{ Auth::user()->notifications->count() }}
                </span>
            </h6>
        </div>


        <div class="card-body">

            @if ( Auth::user()->notifications->count() )
            
                <div class="table-responsive">
            
                    <table class="table table-borderless table-striped table-hover mb-0">
            
                        <thead>
                            <tr>
                                <th>Notification</th>
                                <th>Created</th>
                                <th>Read</th>
                            </tr>
                        </thead>
            
                        <tbody>
            
                            @foreach (Auth::user()->notifications as $notification)
                            
                                <tr>
                                    <td>
                                        <a href="{{ route('notifications.show', $notification) }}" class="{{ !$notification->read_at ? 'font-weight-bold' : '' }}">
                                            A new user has registered
                                        </a>
                                    </td>
                                    <td>
                                        <span title="{{ $notification->created_at->diffForHumans() }}">
                                            {{ $notification->created_at->isoFormat('LLL') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($notification->read_at)
                                            <span>{{ $notification->read_at->isoFormat('LLL') }}</span>
                                        @endif
                                    </td>
                                </tr>
            
                            @endforeach

                        </tbody>
            
                    </table>
            
                </div>

            @else
            
                <p class="text-info mb-0">
                    <i class="fas fa-info-circle"></i> No notification.
                </p>

            @endif


        </div>

    </div>


    


@endsection