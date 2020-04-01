@extends('layouts.admin')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="d-flex">

        <div class="border bg-white rounded text-center p-3 mr-4">
            <h1 class="display-4 mb-0">{{ $users }}</h1>
            <p>{{ $users == 1 ? 'Registered user' : 'Registered Users' }}</p>
        </div>

        <div class="border bg-white rounded text-center p-3">
            <h1 class="display-4 mb-0">{{ $deactivated }}</h1>
            <p>{{ $deactivated == 1 ? 'Deactivated user' : 'Deactivated Users' }}</p>
        </div>

    </div>


@endsection