@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>

@endsection

@section('content')


    @if ( Auth::user()->notifications->count())


        <div class="mb-5">

            <form class="d-inline" action="{{ route('notifications.mark-all-as-read') }}" method="post">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-secondary d-block d-lg-inline mb-3 mb-lg-0">Mark all as read</button>
            </form>

            <form class="d-inline" action="{{ route('notifications.delete') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-secondary">Delete all notifications</button>
            </form>

        </div>


        <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 mb-5">

            <div class="table-responsive">
    
                <table class="table table-borderless table-striped table-hover">
    
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
                                    <a href="{{ route('notifications.show', $notification) }}">A new user has registered</a>
                                </td>
                                <td>
                                    <span title="{{ $notification->created_at->isoFormat('LLL') }}">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td>
                                    @if ($notification->read_at)
                                        {{ $notification->read_at->isoFormat('LLL') }}
                                    @endif
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>

                </table>
    
            </div>

        </div>

        
    @else
    
        <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 text-muted">
            <i class="fas fa-info-circle"></i>
            No notification.
        </div>

    @endif


@endsection