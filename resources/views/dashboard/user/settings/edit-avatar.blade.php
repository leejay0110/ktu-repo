@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.settings.details') }}">User Details</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Avatar</li>
        </ol>
    </nav>

@endsection



@section('content')

    <div class="my-5 text-center">

        @if ( Auth::user()->avatar )
            <img src="{{ asset('/storage' . Str::after(Auth::user()->avatar, 'public')) }}" alt="avatar" class="img-thumbnail rounded-circle mb-4" style="width: 7rem">

            <form action="{{ route('user.settings.delete-avatar') }}" method="post">

                @csrf
                @method('delete')

                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-trash-alt"></i>
                    Delete Avatar
                </button>

            </form>

        @else
            <img src="{{ asset('img/default.png') }}" alt="avatar" class="img-thumbnail rounded-circle" style="width: 7rem">
        @endif

    </div>


    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">Edit Avatar</h6>
        </div>
    
        <div class="card-body">

            <form action="{{ route('user.settings.update-avatar') }}" method="POST" enctype="multipart/form-data">
        
                @csrf
                @method('put')
        
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Profle Picture</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control-file" name="avatar" id="materials" accept="image/png, image/jpeg" required>
                        <small class="text-danger">{{ $errors->first('avatar') }}</small>
                    </div>
                </div>
        
                
                <div class="form-group row mb-0">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        
        
            </form>


            <div class="text-center">
                <img src="" alt="" id="img-preview" width="300">
            </div>

        </div>
    
    
    
        
    
        
    </div>


@endsection


@section('scripts')

    <script>


        document.getElementById('materials').onchange =  function() {

            const url = window.URL.createObjectURL(this.files[0]);
            document.getElementById('img-preview').src = url;
            document.getElementById('img-preview').classList.add('img-thumbnail', 'mt-5')

        };

    </script>
    
@endsection