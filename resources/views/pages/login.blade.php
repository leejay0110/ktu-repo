@extends('layouts.app')

@section('content')
    
    <div class="mx-auto" style="max-width: 24rem">

        <h1>Sign in</h1>
        <p>Please enter your login details.</p>

        <br>

        <form action="{{ route('login') }}" method="post">

            @csrf
    
            <div class="form-group">
                <label>Username</label> <br>
                <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'border-danger' : '' }}" required>
                @if ($errors->has('username'))
                <small class="form-text text-danger">{{ $errors->first('username') }}</small>
                @endif
            </div>
    
            <div class="form-group">
                <label>Password</label> <br>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" required>
                @if ($errors->has('password'))
                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                @endif
            </div>
    
            <button type="submit" class="btn btn-success btn-block">sign in</button>
    
        </form>

        <br><br>

        <p>Don't have an account? <a href="{{ route('register') }}">Create one.</a></p>

    </div>

@endsection