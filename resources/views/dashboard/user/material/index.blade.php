@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection

@section('content')

    <a href="{{ route('user.materials.create') }}" class="btn btn-blue mb-5">
        <i class="fas fa-plus-circle"></i>
        Add Course Materials
    </a>

    <div class="bg-white rounded border p-4 p-lg-5">

        @if (count(Auth::user()->materials))
    
            <div class="table-responsive">
                
                <table class="table table-borderless table-striped table-hover">
                    
                    <thead>
                        <tr>
                            <th>Course Title &Tilde; Course Code</th>
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
    
                    <caption>
                        Materials
                        <span class="badge badge-pill badge-dark">{{ count(Auth::user()->materials) }}</span>
                    </caption>
    
                </table>
    
            </div>
    
        @else
            <p class="text-muted">
                <i class="fas fa-exclamation-circle"></i>
                No post found.
            </p>
        @endif

    </div>



@endsection