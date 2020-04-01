@extends('layouts.material')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('materials.index') }}">Course Materials</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('materials.user', $material->user) }}">{{ $material->user->name }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $material->course_title }} &Tilde; {{ $material->course_code }}</li>
        </ol>
    </nav>

@endsection



@section('content')
    
    

    <h1 class="display-4">{{ $material->course_title }} &Tilde; {{ $material->course_code }}</h1>

    <br>

    <dl class="row mb-5">

        <dt class="col-3">Course Title</dt>
        <dd class="col-9">{{ $material->course_title }}</dd>

        <dt class="col-3">Course Code</dt>
        <dd class="col-9">{{ $material->course_code }}</dd>

        <dt class="col-3">Lecturer Name</dt>
        <dd class="col-9">{{ $material->lecturer }}</dd>

        <dt class="col-3">Posted</dt>
        <dd class="col-9">{{ $material->created_at->isoFormat('LLL') }}</dd>

    </dl>



    <div class="mb-5">


        <h4>Attached Files</h4>

        @if ( $material->files->count() )
    
            <div class="table-responsive">

                <table class="table table-borderless table-striped table-hover">

                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>File size</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($material->files as $file)
                        
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->size() }}</td>
                                <td>
                                    <a href="{{ route('materials.download', $file) }}" target="_blank">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else
        
            <p class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                No file found
            </p>

        @endif

    </div>



@endsection