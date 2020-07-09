@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="row row-cols-1 row-cols-xl-3">

        <div class="col mb-4">
            
            <div class="bg-white rounded border p-4">
    
                
                <div class="text-center">
                    <h1 class="display-4 mb-0">{{ $users }}</h1>
                    <p>{{ $users == 1 ? 'User' : 'Users' }}</p>
                </div>
    
                <hr>
    
                <p>
                    Activate users
                    <span class="badge badge-pill badge-success">{{ $users - $deactivated }}</span>
                </p>
    
                <p>
                    Deactivated users
                    <span class="badge badge-pill badge-danger">{{ $deactivated }}</span>
                </p>
    
            </div>

        </div>

    </div>

@endsection