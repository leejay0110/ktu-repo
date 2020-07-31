@extends('layouts.user')



@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('user.settings.details') }}">User Details</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
        </ol>
    </nav>

@endsection



@section('content')


    <div class="card my-5">

        <div class="card-header">
            <h6 class="mb-0">Edit Details</h6>
        </div>
    
        <div class="card-body">

            <form action="{{ route('user.settings.update-details') }}" method="POST">
        
                @csrf
                @method('put')
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" value="{{ old('name') ?? Auth::user()->name }}" required>
                        @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>
        
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ old('email') ?? Auth::user()->email }}" required>
                        @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
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