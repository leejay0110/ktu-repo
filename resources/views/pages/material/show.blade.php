@extends('layouts.material')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
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
    

    

    <div class="px-4 my-5">

        <div class="container card p-0">

            <div class="card-header">
                <h5 class="mb-0">{{ $material->course_title }}</h5>
                <p class="text-muted mb-0">{{ $material->course_code }}</p>
            </div>

            <div class="card-body">

                <dl class="row mb-0">
            
                    <dt class="col-lg-3">Course Title &Tilde; Code</dt>
                    <dd class="col-lg-9">{{ $material->course_title }} &Tilde; {{ $material->course_code }}</dd>
            
                    <dt class="col-lg-3">Lecturer Name</dt>
                    <dd class="col-lg-9">{{ $material->lecturer }}</dd>
            
                    <dt class="col-lg-3">Created</dt>
                    <dd class="col-lg-9">{{ $material->created_at->isoFormat('LLL') }}</dd>
            
                </dl>

            </div>

        </div>
    
    </div>



    <div class="px-4 my-5">
    

        <div class="container card p-0">

            
            <h6 class="card-header">
                Attached Files
                <span class="badge badge-pill badge-dark">
                    {{ $material->files->count() }}
                </span>
            </h6>

            <div class="card-body">

                @if ( $material->files->count() )
            
                    <div class="table-responsive-lg">
    
                        <table class="table table-borderless table-striped table-hover mb-0">
    
                            <thead>
                                <tr>
                                    <th>Filename</th>
                                    <th colspan="2">Size</th>
                                </tr>
                            </thead>
    
                            <tbody>
    
                                @foreach ($material->files as $file)
                                
                                    <tr>
                                        <td class="text-lowercase">{{ $file->filename }}</td>
                                        <td class="">{{ $file->size() }}</td>
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

            @if ( $material->files->count() > 1 )
            
                <div class="card-footer">

                    <a href="{{ route('materials.download.all', $material) }}" class="btn btn-success">
                        <i class="fas fa-file-archive"></i>
                        Download All
                    </a>

                </div>

            @endif

        </div>

    </div>
    



@endsection