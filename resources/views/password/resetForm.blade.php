@extends('layouts.app')

@section('content')
    
    <div class="mx-auto bg-white  rounded-lg border p-4 p-lg-5" style="max-width: 24rem">

        <h2>Reset Password</h2>
        <p>Please enter your account email address and a new password.</p>

        <br>

        <form action="{{ route('password.update', $token) }}" method="post">

            @csrf
            @method('put')

            <input type="hidden" name="token" value="{{ $token }}">
    


            <div class="form-group">
                <label>Email Address</label> <br>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') ?? $email }}" required>
                @if ($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
                @if ($errors->has('token'))
                <small class="form-text text-danger">{{ $errors->first('token') }}</small>
                @endif
            </div>

            <div class="form-group">
                <label>Password</label> <br>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" required>
                @if ($errors->has('password'))
                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                @endif
            </div>


            <div class="form-group">
                <label>Confirm Password</label> <br>
                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" required>
                @if ($errors->has('password_confirmation'))
                <small class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                @endif
            </div>
    
            <button type="submit" class="btn btn-success btn-block">Reset Password</button>
    
        </form>

        <br><br>

        <p>Go back to <a href="{{ route('login.show') }}">Sign in.</a></p>

    </div>

@endsection