@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.materials') }}">Course Materials</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.materials.show', $material) }}">{{ $material->course_title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">Edit Details</h6>
        </div>
    
    
        <div class="card-body">

            <form action="{{ route('user.materials.update', $material) }}" method="POST">
        
                @csrf
                @method('put')
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Course Title</label>
                    <div class="col-lg-9">
                        <input type="text" name="course_title" class="form-control {{ $errors->has('course_title') ? 'border-danger' : '' }}" value="{{ old('course_title') ?? $material->course_title }}" required>
                        @if ($errors->has('course_title'))
                            <small class="text-danger">{{ $errors->first('course_title') }}</small>
                        @endif
                    </div>
                </div>
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Course Code</label>
                    <div class="col-lg-9">
                        <input type="text" name="course_code" class="form-control {{ $errors->has('course_code') ? 'border-danger' : '' }}" value="{{ old('course_code') ?? $material->course_code }}" required>
                        @if ($errors->has('course_code'))
                            <small class="text-danger">{{ $errors->first('course_code') }}</small>
                        @endif
                    </div>
                </div>
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Lecturer Name</label>
                    <div class="col-lg-9">
                        <input type="text" name="lecturer" class="form-control {{ $errors->has('lecturer') ? 'border-danger' : '' }}" value="{{ old('lecturer') ?? $material->lecturer }}" required>
                        @if ($errors->has('lecturer'))
                            <small class="text-danger">{{ $errors->first('lecturer') }}</small>
                        @endif
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        
            </form>

        </div>


    </div>

    

@endsection