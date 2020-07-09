@extends('layouts.app')

@section('content')
    
    <div class="mx-auto bg-white rounded border shadow-sm p-4" style="max-width: 24rem">

        <h2>Forgot Password</h2>
        <p>Please enter your account email address.</p>

        <br>

        <form action="{{ route('password.email') }}" method="post">

            @csrf

            <div class="form-group">
                <label>Email Address</label> <br>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" required>
                @if ($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
    
            <button type="submit" class="btn btn-success btn-block">Send password reset link</button>
    
        </form>

        <br><br>

        <p>Go back to <a href="{{ route('login.show') }}">Sign in.</a></p>

    </div>

@endsection