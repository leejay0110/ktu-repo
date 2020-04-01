@extends('layouts.admin')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('admin.settings') }}">Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
        </ol>
    </nav>

@endsection



@section('content')


    <h1 class="display-4">Edit Details</h1>

    <br>

    <form action="{{ route('admin.settings.update-details') }}" method="POST">

        @csrf
        @method('put')

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9">
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ old('name') ?? Auth::user()->name }}" required>
                @if ($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Email</label>
            <div class="col-lg-9">
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') ?? Auth::user()->email }}" required>
                @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-9 offset-lg-3">
                <button type="submit" class="btn btn-secondary">submit</button>
            </div>
        </div>

    </form>    


@endsection