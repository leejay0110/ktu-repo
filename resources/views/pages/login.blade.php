@extends('layouts.app')

@section('content')
    

    <div class="mx-auto card" style="max-width: 24rem">

        <div class="card-header">
            
            <h4>Sign in</h4>
            <p class="text-muted mb-0">Please enter your login details.</p>

        </div>
        

        <div class="card-body">

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
        
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign in
                </button>
        
            </form>
    
            <br><br>
    
            <p>Don't have an account? <a href="{{ route('register') }}">Create one.</a></p>
    
            <p>Forgot your password? <a href="{{ route('password.request') }}">Reset.</a></p>

        </div>


    </div>

@endsection