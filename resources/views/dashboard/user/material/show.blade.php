@extends('layouts.user')


@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.materials') }}">Course Materials</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $material->course_title }}</li>
        </ol>
    </nav>

@endsection

@section('content')

    <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 mb-5">
        
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
    
        <a href="{{ route('user.materials.edit', $material) }}">Edit Details</a>

    </div>



    <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 mb-5">

        <h5>Add Files</h5>

        <hr>

        <form action="{{ route('user.materials.files.upload', $material) }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="files">Attach Files</label>
                <div class="col-lg-9">
                    <input type="file" class="form-control-file" name="files[]" id="files" multiple="multiple">
                    <small class="text-danger">{{ $errors->first('files') }}</small>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>

        </form>

    </div>


    
    <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5 mb-5">
        
        <h5>Attached Files</h5>

        <hr>

        @if ( $material->files->count() )
    
            <div class="table-responsive">

                <table class="table table-borderless table-striped table-hover">

                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th></th>
                            <th>Size</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($material->files as $file)
                        
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td>
                                    <a href="{{ route('materials.download', $file) }}" target="_blank">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                                <td>{{ $file->size() }}</td>
                                <th>
                                    <a href="{{ route('user.materials.files.destroy', $file) }}" 
                                       {{-- onclick="event.preventDefault(); document.getElementById('delete-form-{{ $file->id }}').submit();"> --}}

                                       onclick="confirmFileDelete('delete-file-{{ $file->id }}');">

                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <form id="delete-file-{{ $file->id }}" action="{{ route('user.materials.files.destroy', $file) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </th>
                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else
        
            <p class="text-muted">
                <i class="fas fa-info-circle"></i>
                No file found
            </p>

        @endif

    </div>


    <form action="{{ route('user.materials.destroy', $material) }}" method="post">
    
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-dark confirm-delete">Delete Course Material</button>

    </form>


@endsection





@section('scripts')

    <script>

        $(".confirm-delete").click(function(){
            return confirm("Confirm to delete");
        });


        function confirmFileDelete(file) {

            event.preventDefault();
            
            if (confirm("Confirm to delete")) {
                document.getElementById(file).submit();
            }

        }



    </script>

@endsection