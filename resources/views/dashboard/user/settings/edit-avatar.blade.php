@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.settings') }}">Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Avatar</li>
        </ol>
    </nav>

@endsection



@section('content')


    <h1 class="display-4">Edit Avatar</h1>

    <br>


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

        
        <div class="form-group row">
            <div class="col-lg-9 offset-lg-3">
                <button type="submit" class="btn btn-secondary">change</button>
            </div>
        </div>


    </form>

    

    @if (Auth::user()->avatar)


        <form action="{{ route('user.settings.delete-avatar') }}" method="post">
            @csrf
            @method('delete')

            <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                    <button type="submit" class="btn btn-danger">delete</button>
                </div>
            </div>

        </form>

    @endif


@endsection