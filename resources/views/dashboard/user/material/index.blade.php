@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection

@section('content')


    <div class="my-5">

        <a href="{{ route('user.materials.create') }}" class="btn btn-blue">
            <i class="fas fa-plus-circle"></i>
            Add Course Materials
        </a>

    </div>


    <div class="card">

        <div class="card-header">

            <h6 class="mb-0">
                Course Materials
                <span class="badge badge-pill badge-dark">{{ count(Auth::user()->materials) }}</span>
            </h6>

        </div>


        <div class="card-body">

            @if (count(Auth::user()->materials))
        
                <div class="table-responsive">
                    
                    <table class="table table-borderless table-striped table-hover mb-0">
                        
                        <thead>
                            <tr>
                                <th>Course Title &Tilde; Code</th>
                                <th>Lecturer Name</th>
                                <th>Created</th>
                                <th>Files</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach (Auth::user()->materials as $material)
                                <tr>
                                    <td>
                                        <a href="{{ route('user.materials.show', $material) }}">
                                            {{ $material->course_title }} &Tilde; {{ $material->course_code }}
                                        </a>
                                    </td>
                                    <td>{{ $material->lecturer }}</td>
                                    <td>
                                        <span title="{{ $material->created_at->isoFormat('LLL') }}">
                                            {{ $material->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-dark">{{ count($material->files) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
        
                    </table>
        
                </div>
        
            @else
                <p class="text-info mb-0">
                    <i class="fas fa-exclamation-circle"></i>
                    No post found.
                </p>
            @endif

        </div>

    </div>




@endsection