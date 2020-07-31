@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="row row-cols-1 row-cols-xl-3 my-5">

        <div class="col mb-4">
            
            <div class="card">
    
                
                <div class="card-body text-center">
                    <h1 class="display-4">{{ $users }}</h1>
                    <p>{{ $users == 1 ? 'User' : 'Users' }}</p>
                </div>
    
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        Deactivated Users
                        <span class="badge badge-pill badge-danger">{{ $deactivated }}</span>
                    </li>
                    <li class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        Unapproved Users
                        <span class="badge badge-pill badge-danger">{{ $unapproved }}</span>
                    </li>
                </ul>
    
            </div>

        </div>

    </div>

@endsection