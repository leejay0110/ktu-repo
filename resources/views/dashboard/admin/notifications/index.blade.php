@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>

@endsection

@section('content')




@if(Auth::user()->notifications->count())
        
        <div class="mb-4">
        
            <form class="d-inline" action="{{ route('notifications.mark-all-as-read') }}" method="post">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-blue d-block d-lg-inline mb-3 mb-lg-0">Mark all as read</button>
            </form>
        
            <form class="d-inline" action="{{ route('notifications.delete') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-blue">Delete all notifications</button>
            </form>
        
        </div>

    @endif



<div class="bg-white rounded border p-4 mb-4">


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

                @forelse (Auth::user()->notifications as $notification)
                
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
                
                @empty

                    <tr>
                        <td colspan="3">
                            <i class="fas fa-info-circle"></i> No notification.
                        </td>
                    </tr>

                @endforelse
            </tbody>

        </table>

    </div>

</div>

    


@endsection