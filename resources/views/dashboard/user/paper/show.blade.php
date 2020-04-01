@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.papers') }}">Past Exam Papers</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $paper->course_title }}</li>
        </ol>
    </nav>

@endsection

@section('content')

    <h1 class="display-4">
        {{ $paper->course_title }} &Tilde; {{ $paper->course_code }}
    </h1>

    <br>

    <dl class="row mb-5">

        <dt class="col-lg-3">Examiner Name</dt>
        <dd class="col-lg-9">{{ $paper->examiner }}</dd>

        <dt class="col-lg-3">Year</dt>
        <dd class="col-lg-9">{{ $paper->year }}</dd>

        <dt class="col-lg-3">Semester</dt>
        <dd class="col-lg-9">{{ $paper->semester }}</dd>

        <dt class="col-lg-3">Created</dt>
        <dd class="col-lg-9">{{ $paper->created_at->isoFormat('LLL') }}</dd>

    </dl>

    <a href="{{ route('user.papers.edit', $paper->id) }}" class="btn btn-secondary btn-block mb-3">Edit Details</a>

    <a href="{{ route('papers.download', $paper) }}" target="_blank" class="btn btn-secondary btn-block mb-5">Download</a>

    <form action="{{ route('user.papers.destroy', $paper->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-block confirm-delete">Delete</button>
    </form>


    <br>

    
    {{-- <a href="{{ route('paper.open', $paper->id) }}" target="_blank">Open File</a> <br>
    <a href="{{ route('paper.download', $paper->id) }}">Download File</a> --}}
    

@endsection


@section('scripts')

    <script>

        $(".confirm-delete").click(function(){
            return confirm("Confirm to delete");
        });

    </script>

@endsection