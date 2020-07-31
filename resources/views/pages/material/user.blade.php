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


    {{-- <div class="px-4 my-5">

        <div class="container text-center p-4">
        
            @if ( $user->avatar )
                <img src="{{ asset('storage' . Str::after($user->avatar, 'public')) }}" class="img-thumbnail rounded-circle" style="width: 7rem">
            @else
                <img src="{{ asset('img/default.png') }}" class="img-thumbnail rounded-circle" style="width: 7rem">
            @endif
            <h6 class="mb-0 mt-2 text-uppercase">{{ $user->name }}</h6>
    
        </div>

    </div> --}}


    <div class="px-4 my-5">

        <div class="container card p-0 ">

            <div class="card-header text-center p-4">

                @if ( $user->avatar )
                    <img src="{{ asset('storage' . Str::after($user->avatar, 'public')) }}" class="img-thumbnail rounded-circle" style="width: 7rem">
                @else
                    <img src="{{ asset('img/default.png') }}" class="img-thumbnail rounded-circle" style="width: 7rem">
                @endif
                <h6 class="mb-0 mt-2">{{ $user->name }}</h6>

            </div>


            <div class="card-body">
                
                @if ($user->materials->count() )
            
                    <div class="table-responsive">
                        
                        <table class="table table-borderless table-striped table-hover mb-0">
                            
                            <thead>
                                <tr>
                                    <th>Course Title &Tilde; Code</th>
                                    <th>Lecturer Name</th>
                                    <th>Attached Files</th>
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
            
                        </table>
            
                    </div>
            
                @else
                    <p class="text-info mb-0">
                        <i class="fas fa-exclamation-circle"></i>
                        No data found.
                    </p>
                @endif

            </div>

            <div class="card-footer">

                <h6 class="mb-0">
                    Course Materials
                    <span class="badge badge-pill badge-dark">{{ $user->materials->count() }}</span>
                </h6>

            </div>

        </div>

    </div>


@endsection