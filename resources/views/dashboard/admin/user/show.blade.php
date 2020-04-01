@extends('layouts.admin')



@section('nav')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
    </nav>

@endsection



@section('content')
    
    
    <h1 class="display-4">{{ $user->name }}</h1>

    <br>

    <dl class="row mb-5">

        <dt class="col-lg-3">Username</dt>
        <dd class="col-lg-9">{{ $user->username }}</dd>

        <dt class="col-lg-3">Name</dt>
        <dd class="col-lg-9">{{ $user->name }}</dd>


        <dt class="col-lg-3">Email</dt>
        <dd class="col-lg-9">{{ $user->email }}</dd>


        <dt class="col-lg-3">Active</dt>
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


    <dl class="row mb-5">


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



    <form action="{{ route('admin.users.toggle_status', $user->id) }}" method="POST" class="mb-3">

        @csrf
        @method('put')

        <button type="submit" class="btn btn-secondary btn-block">
            {{ $user->isActive() ? 'deactive' : 'activate' }}
        </button>

    </form>

    <form action="{{ route('admin.users.password_reset', $user->id) }}" method="POST">

        @csrf
        @method('put')

        <button type="submit" class="btn btn-secondary btn-block">reset password</button>

    </form>

@endsection