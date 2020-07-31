@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="row row-cols-1 row-cols-xl-3 my-5">

        @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )
        
            <div class="col mb-4">

                <div class="card">

                    <div class="card-body text-center">
                        <h1 class="display-4 mb-0">{{ Auth::user()->papers->count() }}</h1>
                        <p>{{ Auth::user()->papers->count() == 1 ? 'Past Exam Paper' : 'Past Exam Papers' }}</p>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('user.papers.create') }}">Add Past Examination Paper</a>
                    </div>

                </div>

            </div>

        @endif

        @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )

            <div class="col mb-4">

                <div class="card">

                    <div class="card-body text-center">
                        <h1 class="display-4 mb-0">{{ Auth::user()->materials->count() }}</h1>
                        <p>{{ Auth::user()->materials->count() == 1 ? 'Course Material' : 'Course Materials' }}</p>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('user.materials.create') }}">Add Course Material</a>
                    </div>

                </div>


            </div>

        @endif

    </div>

@endsection