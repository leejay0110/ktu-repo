@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="row row-cols-2 row-cols-xl-3">

        <div class="col mb-4">

            <div class="text-center bg-white rounded border p-4 p-lg-5 mb-4">
                <h1 class="display-4 mb-0">{{ Auth::user()->papers->count() }}</h1>
                <p>{{ Auth::user()->papers->count() == 1 ? 'Past Exam Paper' : 'Past Exam Papers' }}</p>
            </div>

            <a href="{{ route('user.papers.create') }}" class="btn btn-blue btn-block">
                <i class="fas fa-plus-circle"></i>
                Add Past Exam Paper
            </a>

        </div>

        <div class="col mb-4">

            <div class="text-center bg-white rounded border p-4 p-lg-5 mb-4">
                <h1 class="display-4 mb-0">{{ Auth::user()->materials->count() }}</h1>
                <p>{{ Auth::user()->materials->count() == 1 ? 'Course Material' : 'Course Materials' }}</p>
            </div>

            <a href="{{ route('user.materials.create') }}" class="btn btn-blue btn-block">
                <i class="fas fa-plus-circle"></i>
                Add Course Material
            </a>

        </div>

    

    </div>


@endsection