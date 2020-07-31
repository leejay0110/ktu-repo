@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Details</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <div class="card my-5">


        <div class="card-header">
            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-0">{{ Auth::user()->username }}</p>
        </div>

        <div class="card-body">

            <dl class="row mb-0">
        
                <dt class="col-lg-3">Email</dt>
                <dd class="col-lg-9">{{ Auth::user()->email }}</dd>
        
                <dt class="col-lg-3">Created at</dt>
                <dd class="col-lg-9">{{ Auth::user()->created_at->isoFormat('LLL') }}</dd>
        
                <dt class="col-lg-3">Last Updated at</dt>
                <dd class="col-lg-9">{{ Auth::user()->updated_at->isoFormat('LLL') }}</dd>
        
            </dl>

        </div>
    
    
        <div class="card-footer">
            <a href="{{ route('user.settings.edit-details') }}" class="d-block">Edit Details</a>
        </div>
        

    </div>


@endsection