@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Details</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <div class="bg-white rounded border p-4 mb-4">


        <h3>{{ Auth::user()->name }}</h3>
        <p class="text-muted">{{ Auth::user()->username }}</p>
    
        <hr>
    
        <dl class="row">
    
            <dt class="col-lg-3">Email</dt>
            <dd class="col-lg-9">{{ Auth::user()->email }}</dd>
    
            <dt class="col-lg-3">Created at</dt>
            <dd class="col-lg-9">{{ Auth::user()->created_at->isoFormat('LLL') }}</dd>
    
            <dt class="col-lg-3">Last Updated at</dt>
            <dd class="col-lg-9">{{ Auth::user()->updated_at->isoFormat('LLL') }}</dd>
    
        </dl>
    
        
        <a href="{{ route('user.settings.edit-details') }}" class="d-block">Edit Details</a>

    </div>


@endsection