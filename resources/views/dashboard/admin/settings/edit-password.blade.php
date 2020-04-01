@extends('layouts.admin')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('admin.settings') }}">Profile</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>

@endsection



@section('content')

    <h1 class="display-4">Change Password</h1>

    <br>

    <form action="{{ route('admin.settings.update-password') }}" method="POST">

        @csrf
        @method('put')

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Old Password</label>
            <div class="col-lg-9">
                <input type="password" name="password_old" class="form-control {{ $errors->has('password_old') ? 'border-danger' : '' }}" value="{{ old('password_old') }}" required>
                @if ($errors->has('password_old'))
                <small class="text-danger">{{ $errors->first('password_old') }}</small>
                @endif 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">New Password</label>
            <div class="col-lg-9">
                <input type="password" name="password_new" class="form-control {{ $errors->has('password_new') ? 'border-danger' : '' }}" value="{{ old('password_new') }}" required>
                @if ($errors->has('password_new'))
                <small class="text-danger">{{ $errors->first('password_new') }}</small>
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