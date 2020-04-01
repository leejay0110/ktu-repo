@extends('layouts.app')

@section('title', 'KTUCM - Register')

@section('content')

    <div class="mx-auto" style="max-width: 350px">


        <h1 class="display-4">Register</h1>
        <p>Please provide the required information for your account creation.</p>

        <br>

        <form action="{{ route('register') }}" method="post">

            @csrf
    
            <div class="form-group">
                <label>Name</label> <br>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                @endif
            </div>

            <div class="form-group">
                <label>Username</label> <br>
                <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'border-danger' : '' }}" value="{{ old('username') }}" required>
                @if ($errors->has('username'))
                <small class="form-text text-danger">{{ $errors->first('username') }}</small>
                @endif
            </div>

            <div class="form-group">
                <label>Email Address</label> <br>
                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
    
            <div class="form-group">
                <label>Password</label> <br>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" required>
                @if ($errors->has('password'))
                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                @endif
            </div>
    
            <button type="submit" class="btn btn-secondary btn-block">submit</button>
    
        </form>

        <br><br>

        <p>Already have an account? <a href="{{ route('login.show') }}">Sign in.</a></p>

    </div>

@endsection