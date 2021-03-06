@extends('layouts.app')



@section('header')
    

    <div class="bg-blue text-white px-4 py-5">

        <div class="container p-0">

            <h3>About {{ env('APP_NAME') }}</h3>

            <br>

            <p>
                {{ env('APP_NAME') }} is the institutional repository of Koforidua Technical University.
                {{ env('APP_NAME') }} is an open-access online archive developed for the collection, preservation and distribution of digital resources.
                The platform was built as a final year project by four students of Korodidua Technical University.
            </p>

        </div>


    </div>


@endsection



@section('content')


    <div class="card my-5">

        <h6 class="card-header text-center">Why {{ env('APP_NAME') }}?</h6>

        <div class="card-body">

            <dl class="row mb-0">
    
                <dt class="col-lg-3">Efficient Distribution</dt>
                <dd class="col-lg-9">
                    <p>One reason why we developed this platform was to help make distribution of resources an easier process. With this platform, lecturers or course representatives can easily upload course materials unto the platform without any difficulties.</p>
                </dd>
    
                <dt class="col-lg-3">Easy Access</dt>
                <dd class="col-lg-9">
                    <p>Easy access is anthoer resaon for developing this platform. Users which in most cases are students can access course materials on the platform without any limitation. The platform is an open-access platform; students can download course materials without the need for creating an account.</p>
                    
                    <p>Also, the platform provides a section for downloading past examination papers which is very important to students especially when preparing for exminations. Students can download pdf copies of past examination papers so far as they have been uploaded unto the platform by any user.</p>
                </dd>
    
                <dt class="col-lg-3">Online Repository</dt>
                <dd class="col-lg-9">
                    <p>Another reason why this platform was developed was to create an online repository for the university at large. We wanted to help create an archive of digital resources for the university; a single point where people will seek when looking for digital resources like course materils and past examination papers</p>
                </dd>
    
            </dl>

        </div>

    </div>


    
    <div class="card my-5">

        <h6 class="card-header text-center">The Developers</h6>

        <div class="card-body">
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        
    
                <div class="col mb-4 mb-lg-0">
    
                    <div class="text-center">
        
                        <img src="{{ asset('img/developers/lee.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 8rem">
        
                        <h6 class="mt-2">John Lee</h6>
                        <small class="text-muted">
                            Computer Network Management <br>
                            leejay0110@gmail.com
                        </small>
        
                    </div>
    
                </div>
        
    
                <div class="col mb-4 mb-lg-0">
    
                    <div class="text-center">
        
                        <img src="{{ asset('img/developers/thompson.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 8rem">
        
                        <h6 class="mt-2">Isaac Thompson</h6>
                        <small class="text-muted">
                            Computer Science <br>
                            xxx@gmail.com
                        </small>
        
                    </div>
    
                </div>
        
    
                <div class="col mb-4 mb-lg-0">
    
                    <div class="text-center">
        
                        <img src="{{ asset('img/developers/frimpong.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 8rem">
        
                        <h6 class="mt-2">Emmanuel Adu Frimpong</h6>
                        <small class="text-muted">
                            Computer Network Management <br>
                            xxx@gmail.com
                        </small>
        
                    </div>
    
                </div>
        
    
                <div class="col mb-lg-0">
    
                    <div class="text-center">
        
                        <img src="{{ asset('img/developers/gadzo.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 8rem">
        
                        <h6 class="mt-2">Patrick Gadzo</h6>
                        <small class="text-muted">
                            Computer Network Management <br>
                            xxx@gmail.com
                        </small>
        
                    </div>
    
                </div>
        
    
            </div>

        </div>
        

    </div>


@endsection