@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.papers') }}">Past Exam Papers</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.papers.show', $paper) }}">{{ $paper->course_title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
        </ol>
    </nav>

@endsection

@section('content')


    <div class="bg-white rounded-lg border p-4 p-lg-5">

        <h3>Edit Details</h3>
    
        <hr>
    
        <form action="{{ route('user.papers.update', $paper) }}" method="post">
    
            @csrf
            @method('put')
    
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Course Title</label>
                <div class="col-lg-9">
                    <input type="text" name="course_title" class="form-control {{ $errors->has('course_title') ? 'border-danger' : '' }}" value="{{ old('course_title') ?? $paper->course_title }}" required>
                    @if ($errors->has('course_title'))
                        <small class="text-danger">{{ $errors->first('course_title') }}</small>
                    @endif
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Course Code</label>
                <div class="col-lg-9">
                    <input type="text" name="course_code" class="form-control {{ $errors->has('course_code') ? 'border-danger' : '' }}" value="{{ old('course_code') ?? $paper->course_code }}" required>
                    @if ($errors->has('course_code'))
                        <small class="text-danger">{{ $errors->first('course_code') }}</small>
                    @endif
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Examiner Name</label>
                <div class="col-lg-9">
                    <input type="text" name="examiner" class="form-control {{ $errors->has('examiner') ? 'border-danger' : '' }}" value="{{ old('examiner') ?? $paper->examiner }}" required>
                    @if ($errors->has('examiner'))
                        <small class="text-danger">{{ $errors->first('examiner') }}</small>
                    @endif
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Exam Year</label>
                <div class="col-lg-9">
                    <input type="text" name="year" class="form-control {{ $errors->has('year') ? 'border-danger' : '' }}" value="{{ old('year') ?? $paper->year }}" required>
                    @if ($errors->has('year'))
                        <small class="text-danger">{{ $errors->first('year') }}</small>
                    @endif
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Semester</label>
                <div class="col-lg-9">
    
                    <select class="custom-select" name="semester" required>
                        <option value="1" {{ $paper->semester == 1 ? 'selected' : '' }}>First</option>
                        <option value="2" {{ $paper->semester == 2 ? 'selected' : '' }}>Second</option>
                    </select>
                    @if ($errors->has('semester'))
                        <small class="text-danger">{{ $errors->first('semester') }}</small>
                    @endif
                </div>
            </div>
    
    
            <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
    
        </form>

    </div>


@endsection