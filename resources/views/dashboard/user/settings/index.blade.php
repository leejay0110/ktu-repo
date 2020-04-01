@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
    </nav>

@endsection



@section('content')
    
    <h1 class="display-4">{{ Auth::user()->name }}</h1>

    <br>

    <dl class="row mb-5">

        <dt class="col-lg-3">Username</dt>
        <dd class="col-lg-9">{{ Auth::user()->username }}</dd>

        <dt class="col-lg-3">Name</dt>
        <dd class="col-lg-9">{{ Auth::user()->name }}</dd>

        <dt class="col-lg-3">Email</dt>
        <dd class="col-lg-9">{{ Auth::user()->email }}</dd>

        <dt class="col-lg-3">Created at</dt>
        <dd class="col-lg-9">{{ Auth::user()->created_at->isoFormat('LLL') }}</dd>

        <dt class="col-lg-3">Last Updated at</dt>
        <dd class="col-lg-9">{{ Auth::user()->updated_at->isoFormat('LLL') }}</dd>

    </dl>

    
    <a href="{{ route('user.settings.edit-details') }}" class="btn btn-secondary btn-block mb-3">Edit Details</a>
    <a href="{{ route('user.settings.edit-avatar') }}" class="btn btn-secondary btn-block mb-3">Edit Avatar</a>
    <a href="{{ route('user.settings.edit-password') }}" class="btn btn-secondary btn-block">Change Password</a>

@endsection