@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.settings.details') }}">User Details</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>

@endsection



@section('content')


    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">Edit Password</h6>
        </div>
    
        <div class="card-body">

            <form action="{{ route('user.settings.update-password') }}" method="POST">
        
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
        
                
                <div class="form-group row mb-0">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
        
        
            </form>

        </div>
    

    </div>


@endsection