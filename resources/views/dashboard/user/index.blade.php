@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="row row-cols-1 row-cols-xl-3">

        @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )
        
        <div class="col mb-4">

            <div class="text-center bg-white rounded border p-4">
                <h1 class="display-4 mb-0">{{ Auth::user()->papers->count() }}</h1>
                <p>{{ Auth::user()->papers->count() == 1 ? 'Past Exam Paper' : 'Past Exam Papers' }}</p>

                <hr>

                <a href="{{ route('user.papers.create') }}">
                    Add Past Examination Paper
                </a>

            </div>


        </div>

        @endif


        @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )

        <div class="col mb-4">

            <div class="text-center bg-white rounded border p-4">
                <h1 class="display-4 mb-0">{{ Auth::user()->materials->count() }}</h1>
                <p>{{ Auth::user()->materials->count() == 1 ? 'Course Material' : 'Course Materials' }}</p>

                <hr>

                <a href="{{ route('user.materials.create') }}">
                    Add Course Material
                </a>

            </div>


        </div>

        @endif


    

    </div>


@endsection