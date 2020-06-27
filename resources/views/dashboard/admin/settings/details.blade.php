@extends('layouts.admin')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <div class="bg-white rounded border p-4 p-lg-5">

        <h3>{{ Auth::user()->name }}</h3>
    
        <hr>
    
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

        <a href="{{ route('admin.settings.edit-details') }}" class="d-block">Edit Details</a>

    </div>



@endsection