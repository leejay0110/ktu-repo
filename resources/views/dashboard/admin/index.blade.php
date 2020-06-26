@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="card" style="max-width: 24rem !important">

        <div class="card-body p-4 p-lg-5">

            
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

    {{-- <div class="d-flex">

        <div class="border bg-white rounded text-center p-4 p-lg-5 mr-4">
            <h1 class="display-4 mb-0">{{ $users }}</h1>
            <p>{{ $users == 1 ? 'Registered user' : 'Registered Users' }}</p>
        </div>

        <div class="border bg-white rounded text-center p-4 p-lg-5">
            <h1 class="display-4 mb-0">{{ $deactivated }}</h1>
            <p>{{ $deactivated == 1 ? 'Deactivated user' : 'Deactivated Users' }}</p>
        </div>

    </div> --}}


@endsection