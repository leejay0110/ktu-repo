@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Past Exam Papers</li>
        </ol>
    </nav>

@endsection

@section('content')

    <a href="{{ route('user.papers.create') }}" class="btn btn-primary btn-block mb-5">add past exam paper</a>


    
    @if (Auth::user()->papers->count())

        <div class="table-responsive">
    
            <table class="table table-borderless table-striped table-hover">

                <caption>
                    Past Exam Papers
                    <span class="badge badge-pill badge-dark">{{ Auth::user()->papers->count() }}</span>
                </caption>

                <thead>
                    <th>Course Title &Tilde; Course Code</th>
                    <th>Examiner Name</th>
                    <th>Year - Semester</th>
                    <th>Created</th>
                    <th></th>
                </thead>

                <tbody>

                    @foreach (Auth::user()->papers as $paper)
                    
                        <tr>

                            <td>{{ $paper->course_title }} &Tilde; {{ $paper->course_code }}</td>
                            <td>{{ $paper->examiner }}</td>
                            <td>{{ $paper->year }} - {{ $paper->semester }}</td>
                            <td>
                                <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                    {{ $paper->created_at->diffForHumans() }}
                                </span>
                            </td>
                            <td><a href="{{ route('user.papers.show', $paper->id) }}"><i class="fas fa-eye fa-lg"></i></a></td>

                        </tr>
            
                    @endforeach

                </tbody>

            </table>

        </div>

    @else
        <p class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            No data found
        </p>
    @endif


@endsection