@extends('layouts.app')

@section('content')
    
    <div class="mx-auto card" style="max-width: 24rem">

        <div class="card-header">

            <h4>Forgot Password</h4>
            <p class="text-muted mb-0">Please enter your account email address.</p>

        </div>


        <div class="card-body">

            <form action="{{ route('password.email') }}" method="post">
    
                @csrf
    
                <div class="form-group">
                    <label>Email Address</label> <br>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" required>
                    @if ($errors->has('email'))
                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
        
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-paper-plane"></i>
                    Send password reset link
                </button>
        
            </form>
    
            <br><br>
    
            <p>Go back to <a href="{{ route('login.show') }}">Sign in.</a></p>

        </div>


    </div>

@endsection