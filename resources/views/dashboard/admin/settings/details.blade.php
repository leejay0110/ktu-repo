@extends('layouts.admin')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>

@endsection



@section('content')
    

    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">Admin Details</h6>
        </div>

    
        <div class="card-body">
            
            <dl class="row mb-0">
        
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

        </div>
    
        <div class="card-footer">
            <a href="{{ route('admin.settings.edit-details') }}" class="d-block">Edit Details</a>
        </div>

    </div>



@endsection