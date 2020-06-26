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


    <div class="bg-white rounded border p-4 p-lg-5">

        <h3>Change Password</h3>
    
        <hr>
    
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
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" value="{{ old('password') }}" required>
                    @if ($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
            </div>

            
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Confirm New Password</label>
                <div class="col-lg-9">
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" value="{{ old('password_confirmation') }}" required>
                    @if ($errors->has('password_confirmation'))
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
            </div>

    
            <div class="form-group row">
                <div class="col-lg-9 offset-lg-3">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
    
    
        </form>

    </div>

@endsection