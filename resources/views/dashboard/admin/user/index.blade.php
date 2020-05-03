@extends('layouts.admin')



@section('nav')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <ul class="nav nav-tabs" id="usersTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deactivated-tab" data-toggle="tab" href="#deactivated" role="tab" aria-controls="deactivated" aria-selected="false">Deactivated</a>
        </li>
    </ul>

    <div class="tab-content mt-5" id="myTabContent">
        

        {{-- all users --}}
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

            @if ($users->count())

                <div class="table-responsive">

                    <table class="table table-striped table-borderless table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Name &Tilde; Username</th>
                                <th>Created</th>
                                <th>Active</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }} &Tilde;
                                        <a href="{{ route('admin.users.show', $user) }}">{{ $user->username }}</a>
                                    </td>
                                    <td>{{ $user->created_at->isoFormat('LLL') }}</td>
                                    <td>
                                        @if ($user->isActive())
                                            <i class="fas fa-check-circle fa-lg text-success"></i>
                                        @else
                                            <i class="fas fa-times-circle fa-lg text-danger"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <caption>
                            Users
                            <span class="badge badge-pill badge-dark">{{ $users->count() }}</span>
                        </caption>

                    </table>

                </div>

            @else

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    No data found
                </div>

            @endif

        </div>


        {{-- deactivated users --}}
        <div class="tab-pane fade" id="deactivated" role="tabpanel" aria-labelledby="deactivated-tab">

            @if ($deactivated->count())

                <div class="table-responsive">

                    <table class="table table-striped table-borderless table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Name &Tilde; username</th>
                                <th>Created</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($deactivated as $user)

                                <tr>
                                    <td>
                                        {{ $user->name }} &Tilde;
                                        <a href="{{ route('admin.users.show', $user) }}">{{ $user->username }}</a>
                                    </td>
                                    <td>{{ $user->created_at->isoFormat('LLL') }}</td>
                                </tr>

                            @endforeach

                        </tbody>

                        <caption>
                            Users
                            <span class="badge badge-pill badge-dark">{{ $deactivated->count() }}</span>
                        </caption>

                    </table>

                </div>

            @else

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    No data found
                </div>

            @endif

        </div>

    </div>

@endsection