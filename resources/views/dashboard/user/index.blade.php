@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="d-flex">

        <div class="mr-5">

            <div class="border bg-white rounded text-center p-3 mb-3">
                <h1 class="display-4 mb-0">{{ Auth::user()->papers->count() }}</h1>
                <p>{{ Auth::user()->papers->count() == 1 ? 'Past Exam Paper' : 'Past Exam Papers' }}</p>
            </div>

            <a href="{{ route('user.papers.create') }}">Add Past Exam Paper</a>

        </div>

        <div>

            <div class="border bg-white rounded text-center p-3 mb-3">
                <h1 class="display-4 mb-0">{{ Auth::user()->materials->count() }}</h1>
                <p>{{ Auth::user()->materials->count() == 1 ? 'Course Material' : 'Course Materials' }}</p>
            </div>

            <a href="{{ route('user.materials.create') }}">Add Course Material</a>

        </div>

    

    </div>


@endsection