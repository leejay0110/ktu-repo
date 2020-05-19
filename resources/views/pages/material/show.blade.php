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
    
    
    <div class="bg-white rounded-lg border p-4 p-lg-5 mb-5">

        <h3>{{ $material->course_title }}</h3>

        <p class="text-muted">{{ $material->course_code }}</p>
    
        <hr>
    
        <dl class="row">
    
            <dt class="col-lg-3">Course Title</dt>
            <dd class="col-lg-9">{{ $material->course_title }}</dd>
    
            <dt class="col-lg-3">Course Code</dt>
            <dd class="col-lg-9">{{ $material->course_code }}</dd>
    
            <dt class="col-lg-3">Lecturer Name</dt>
            <dd class="col-lg-9">{{ $material->lecturer }}</dd>
    
            <dt class="col-lg-3">Created</dt>
            <dd class="col-lg-9">{{ $material->created_at->isoFormat('LLL') }}</dd>
    
        </dl>

    </div>




    <div class="mb-5">


        
        <div class="bg-white rounded-lg border p-4 p-lg-5">
            
            <h4 class="mb-3">Attached Files</h4>

            <hr>

            @if ( $material->files->count() )
        
                <div class="table-responsive-lg">

                    <table class="table table-borderless table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Filename</th>
                                <th colspan="2">Size</th>
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
            
                <span class="text-info">
                    <i class="fas fa-info-circle"></i>
                    No file found
                </span>

            @endif
    
        </div>

    </div>



@endsection