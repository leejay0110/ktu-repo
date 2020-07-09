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
    
    

    <div class="bg-white rounded border p-4 mb-4">

        <h1>{{ $user->name }}</h1>
    
        <hr>
    
        <dl class="row mb-4">
    
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


    <div class="bg-white rounded border p-4 mb-4">
    

        <h3>Past Exam Papers &amp; Course Materials</h3>

        <hr>
    
        <dl class="row mb-0">
    
            <dt class="col-lg-3">Course Materials</dt>
            <dd class="col-lg-9">
                <span class="badge badge-pill badge-dark">
                    {{ $user->materials->count() }}
                </span>
            </dd>
    
            <dt class="col-lg-3">Past Exam Papers</dt>
            <dd class="col-lg-9">
                <span class="badge badge-pill badge-dark">
                    {{ $user->papers->count() }}
                </span>
            </dd>
        
        </dl>

    </div>



    <form action="{{ route('admin.users.password_reset', $user) }}" method="POST">

        @csrf
        @method('put')

        <button type="submit" class="btn btn-dark d-block">Reset Password</button>

    </form>

@endsection