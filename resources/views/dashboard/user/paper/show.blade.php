@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.papers') }}">Past Exam Papers</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $paper->course_title }}</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="bg-white rounded border p-4 mb-4">

        <h3>{{ $paper->course_title }}</h3>
        <p class="text-muted">{{ $paper->course_code }}</p>
    
        <hr>
    
        <dl class="row">
    
            <dt class="col-lg-3">Examiner Name</dt>
            <dd class="col-lg-9">{{ $paper->examiner }}</dd>
    
            <dt class="col-lg-3">Year</dt>
            <dd class="col-lg-9">{{ $paper->year }}</dd>
    
            <dt class="col-lg-3">Semester</dt>
            <dd class="col-lg-9">{{ $paper->semester }}</dd>
    
            <dt class="col-lg-3">Created</dt>
            <dd class="col-lg-9">{{ $paper->created_at->isoFormat('LLL') }}</dd>
    
        </dl>
    
        <a href="{{ route('user.papers.edit', $paper) }}">Edit Details</a>

    </div>


    <form action="{{ route('user.papers.destroy', $paper) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-dark confirm-delete">Delete this Past Exam Paper</button>
    </form>
    

@endsection


@section('scripts')

    <script>

        $(".confirm-delete").click(function(){
            return confirm("Confirm to delete");
        });

    </script>

@endsection