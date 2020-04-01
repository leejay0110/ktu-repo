@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection

@section('content')

    <a href="{{ route('user.materials.create') }}" class="btn btn-primary btn-block mb-5">add course materials</a>


    
    <h5>Course Materials</h5>
    @if (count(Auth::user()->materials))

        <div class="table-responsive">
            
            <table class="table table-borderless table-striped table-hover">
                
                <thead>
                    <tr>
                        <th>Course Title &Tilde; Course Code</th>
                        <th>Lecturer Name</th>
                        <th>Created</th>
                        <th>Files</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Auth::user()->materials as $material)
                        <tr>
                            <td>{{ $material->course_title }} &Tilde; {{ $material->course_code }}</td>
                            <td>{{ $material->lecturer }}</td>
                            <td>
                                <span title="{{ $material->created_at->isoFormat('LLL') }}">
                                    {{ $material->created_at->diffForHumans() }}
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-pill badge-dark">{{ count($material->files) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('user.materials.show', $material->id) }}"><i class="fas fa-eye fa-lg"></i></a>
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
        <p class="alert alert-info">
            <i class="fas fa-exclamation-circle"></i>
            No post found.
        </p>
    @endif


@endsection