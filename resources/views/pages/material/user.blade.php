@extends('layouts.material')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('materials.index') }}">Course Materials</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
    </nav>

@endsection



@section('content')


    <div class="bg-white rounded border shadow-sm text-center p-4">
    
        @if ( $user->avatar )
            <img src="{{ asset('storage' . Str::after($user->avatar, 'public')) }}" class="img-thumbnail rounded-circle" style="width: 7rem">
        @else
            <img src="{{ asset('img/default.png') }}" class="img-thumbnail rounded-circle" style="width: 7rem">
        @endif
        <h5>{{ $user->name }}</h5>

    </div>

    <br>


    @if ($user->materials->count() )

        <div class="bg-white rounded border shadow-sm p-4 mb-4">

            <div class="table-responsive">
                
                <table class="table table-borderless table-striped table-hover">
                    
                    <thead>
                        <tr>
                            <th>Course Title &Tilde; Course Code</th>
                            <th>Lecturer Name</th>
                            <th>Files</th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($user->materials as $material)
                            <tr>
                                <td>{{ $material->course_title }} &Tilde; {{ $material->course_code }}</td>
                                <td>{{ $material->lecturer }}</td>
                                <td>
                                    <span class="badge badge-pill badge-dark">{{ count($material->files) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('materials.show', $material) }}"><i class="fas fa-eye fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
    
                    <caption>
                        Materials
                        <span class="badge badge-pill badge-dark">{{ $user->materials->count() }}</span>
                    </caption>
    
                </table>
    
            </div>

        </div>

    @else
        <p class="alert alert-info">
            <i class="fas fa-exclamation-circle"></i>
            No data found.
        </p>
    @endif


@endsection