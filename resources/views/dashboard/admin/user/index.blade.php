@extends('layouts.admin')


@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
@endsection



@section('nav')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <div class="card my-5">
        
        <h6 class="card-header">
            Users
            <span class="badge badge-pill badge-dark">
                {{ $users->count() }}
            </span>
        </h6>
        
        <div class="card-body">
            
            @if ( $users->count() )
            
                <div class="table-responsive">
                
                    <table class="table table-borderless table-striped table-hover" id="all-users">
                
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
                                            <span class="text-success">
                                                <i class="fas fa-check-circle"></i> Active
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                <i class="fas fa-times-circle"></i> Deactived
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                
                            @endforeach
                
                        </tbody>
                
                    </table>
                
                </div>

            @else
            
                <p class="text-info mb-0">
                    <i class="fas fa-info-circle"></i> No user found
                </p>

            @endif


        </div>


    </div>


@endsection


@section('script')

<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>

<script>

    $(document).ready( function () {
        $('#all-users').DataTable();
    } );

</script>

@endsection