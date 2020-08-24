@extends('layouts.app')

@section('title', 'KTUCM - Register')

@section('content')

    <div class="mx-auto card" style="max-width: 24rem">


        <div class="card-header">
            
            <h4>Register</h4>
            <p class="text-muted mb-0">Please provide the required information for your account creation.</p>

        </div>


        <div class="card-body">


            <form action="{{ route('register') }}" method="post">
    
                @csrf
        
                <div class="form-group">
                    <label>Full Name</label> <br>
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
    
    
                <div class="form-group">
    
                    <div>
                        <h6 class="font-weight-bold">Select Account Privileges</h6>
                        <p>Please select your account privilege</p>
                    </div>
    
                    <div class="custom-control custom-radio">
                        <input type="radio" id="paper" name="roles" class="custom-control-input" value="pep upload" required>
                        <label class="custom-control-label" for="paper">Past examination papers upload</label>
                    </div>
                    
                    <div class="custom-control custom-radio">
                        <input type="radio" id="course_material" name="roles" class="custom-control-input" value="cm upload">
                        <label class="custom-control-label" for="course_material">Course materials upload</label>
                    </div>
    
                    <div class="custom-control custom-radio">
                        <input type="radio" id="both" name="roles" class="custom-control-input" value="both">
                        <label class="custom-control-label" for="both">Both</label>
                    </div>
    
    
                </div>
        
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-check"></i>
                    Submit
                </button>
        
            </form>
    
            <br><br>
    
            <p>Already have an account? <a href="{{ route('login.show') }}">Sign in.</a></p>

        </div>




    </div>

@endsection