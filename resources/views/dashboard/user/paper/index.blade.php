@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Past Exam Papers</li>
        </ol>
    </nav>

@endsection

@section('content')



    <div class="my-5">

        <a href="{{ route('user.papers.create') }}" class="btn btn-blue">
            <i class="fas fa-plus-circle"></i>
            Add Past Examination Paper
        </a>

    </div>



    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">
                Past Examination Papers
                <span class="badge badge-pill badge-dark">{{ Auth::user()->papers->count() }}</span>
            </h6>
        </div>

        <div class="card-body">

            @if (Auth::user()->papers->count())
        
                <div class="table-responsive">
            
                    <table class="table table-borderless table-striped table-hover">
        
                        <thead>
                            <th>Course Title &Tilde; Course Code</th>
                            <th>Examiner</th>
                            <th>Year - Semester</th>
                            <th>Created</th>
                            <th></th>
                        </thead>
        
                        <tbody>
        
                            @foreach (Auth::user()->papers as $paper)
                            
                                <tr>
        
                                    <td>
                                        <a href="{{ route('user.papers.show', $paper) }}">
                                            {{ $paper->course_title }} &Tilde; {{ $paper->course_code }}
                                        </a>
                                    </td>
                                    <td>{{ $paper->examiner }}</td>
                                    <td>{{ $paper->year }} - {{ $paper->semester }}</td>
                                    <td>
                                        <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                            {{ $paper->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('papers.download', $paper) }}">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </td>
        
                                </tr>
                    
                            @endforeach
        
                        </tbody>
        
                    </table>
        
                </div>
        
            @else
                <p class="text-info mb-0">
                    <i class="fas fa-info-circle"></i>
                    No data found
                </p>
            @endif

        </div>

    </div>
        

@endsection