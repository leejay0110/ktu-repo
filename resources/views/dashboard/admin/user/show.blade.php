@extends('layouts.admin')



@section('nav')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
    </nav>

@endsection



@section('content')
    


    @if ( !$user->isApproved() )
        
        <div class="my-5">
            
            <h3>Approve Account</h3>
            <p>This account has not yet been approved.</p>

            <form action="{{ route('admin.users.approve', $user) }}" method="post">

                @csrf
                @method('put')

                <button type="submit" class="btn btn-success btn-block">
                    Approve Account
                </button>

            </form>
            
        </div>

    @endif



    <div class="card my-5">

        <h6 class="card-header">{{ $user->name }}</h6>
        
        <div class="card-body">

            <dl class="row mb-0">
        
                <dt class="col-lg-3">Username</dt>
                <dd class="col-lg-9">{{ $user->username }}</dd>
        
                <dt class="col-lg-3">Name</dt>
                <dd class="col-lg-9">{{ $user->name }}</dd>
        
                <dt class="col-lg-3">Email</dt>
                <dd class="col-lg-9">{{ $user->email }}</dd>
        
                <dt class="col-lg-3">Active Status</dt>
                <dd class="col-lg-9">
                    @if ($user->isActive())
                        <i class="fas fa-check-circle fa-lg text-success"></i>
                    @else
                        <i class="fas fa-times-circle fa-lg text-danger"></i>
                    @endif
                </dd>
        
                <dt class="col-lg-3">Created</dt>
                <dd class="col-lg-9">{{ $user->created_at->isoFormat('LLL') }}</dd>
        
            </dl>

        </div>

        <div class="card-footer">

            @if ($user->isActive())
                <form action="{{ route('admin.users.deactivate', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-danger d-block">Deactive</button>
                </form>
            @else
                <form action="{{ route('admin.users.activate', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success d-block">Activate</button>
                </form>
            @endif

        </div>
    



    </div>


    
    <div class="card my-5">

        <h6 class="card-header">User Roles</h6>
        
        <div>

            <ul class="list-group list-group-flush">
    
                @foreach ($roles as $role)
    
                    <li class="list-group-item bg-white d-flex justify-content-between align-items-center">
    
                        @if ( $user->roles->pluck('name')->contains( $role->name ) )
    
                            <span class="text-success">
                                {{ ( $role->name  == 'pep upload' ) ? 'Past Examination Paper Upload' : 'Course Materials Upload' }}
                            </span>
                        
                            <form action="{{ route('admin.users.roles.destroy', [ 'user' => $user, 'role' => $role ]) }}" method="post">
    
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete Role</button>
    
                            </form>
    
                        @else
                        
                            <span class="text-danger">
                                {{ ( $role->name  == 'pep upload' ) ? 'Past Examination Paper Upload' : 'Course Materials Upload' }}
                            </span>
    
                            <form action="{{ route('admin.users.roles.add', [ 'user' => $user, 'role' => $role ]) }}" method="post">
    
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Add Role</button>
    
                            </form>
    
                        @endif
                        
                    </li>
    
                @endforeach
    
            </ul>

        </div>

    </div>



    <div class="card my-5">
    
        <h5 class="card-header">Past Exam Papers &amp; Course Materials</h5>
        
        <div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Course Materials
                    <span class="badge badge-pill badge-dark">
                        {{ $user->materials->count() }}
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Past Exam Papers
                    <span class="badge badge-pill badge-dark">
                        {{ $user->papers->count() }}
                    </span>
                </li>

            </ul>
        </div>

    </div>



    <form action="{{ route('admin.users.password_reset', $user) }}" method="POST">

        @csrf
        @method('put')

        <button type="submit" class="btn btn-dark d-block">Reset Password</button>

    </form>

@endsection