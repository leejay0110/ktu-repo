@extends('layouts.app')


@section('content')
    

    <div class="bg-white rounded-lg border p-4 p-lg-5 mx-auto mb-4">
        
        <h3>About {{ env('APP_NAME') }}</h3>

        <hr>

        <p>
            {{ env('APP_NAME') }} is the institutional repository of Koforidua Technical University.
            {{ env('APP_NAME') }} is an open-access electronic archive developed for the collection, preservation and distribution of digital materials or resources.
        </p>

        <p>
            The platform was built as a final year project work by four students from the computer science department;
            three networking students and one computer science student.
        </p>

    </div>


    <div class="bg-white rounded-lg border p-4 p-lg-5 mx-auto mb-4">

        <h4 class="text-centep-4 r-lg">Why {{ env('APP_NAME') }}?</h4>

        <hr>

        <dl class="row">

            <dt class="col-lg-3">Efficient Distribution</dt>
            <dd class="col-lg-9">
                <p>One reason why we developed this platform was to help make distribution of resources an easier process. With this platform, lecturers or course representatives can easily upload course materials unto the platform without any difficulties.</p>
            </dd>

            <dt class="col-lg-3">Easy Access</dt>
            <dd class="col-lg-9">
                <p>Easy access is anthoer resaon for developing this platform. Users which in most cases are students can access course materials on the platform without any limitation. The platform is an open-access platform; students can download course materials without the need for creating an account.</p>
                
                <p>Also, the platform has a section for downloading past exam papers which is very important to students mostly during exam periods. Students can download the past exam papers so far as they have been uploaded unto the platform by any user.</p>
            </dd>
            <dt class="col-lg-3">Online Repository</dt>
            <dd class="col-lg-9">
                <p>Another reason why this platform was developed was to create an online repository for the university at large. We wanted to help create an archive of digital resources for the university; a single point where users will seek when looking for digital resources like course materils and past exam papers</p>
            </dd>

        </dl>

    </div>

    

    <h4 class="text-center text-muted mt-5 mb-4">The Developers</h4>

    <div class="row row-cols-1 row-cols-lg-2">

        <div class="col mb-4">
            <div class="bg-white rounded border text-center p-4 p-lg-5">

                <img src="{{ asset('img/developers/lee.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 7rem">

                <h5 class="mt-3">John Lee</h5>
                <small class="text-muted">
                    HND Computer Network Management <br>
                    leejay0110@gmail.com
                </small>

            </div>
        </div>

        <div class="col mb-4">
            <div class="bg-white rounded border text-center p-4 p-lg-5">

                <img src="{{ asset('img/developers/thompson.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 7rem">

                <h5 class="mt-3">Isaac Thompson</h5>
                <small class="text-muted">
                    HND Computer Science <br>
                    xxx@gmail.com
                </small>

            </div>
        </div>

        <div class="col mb-4">
            <div class="bg-white rounded border text-center p-4 p-lg-5">

                <img src="{{ asset('img/developers/frimpong.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 7rem">

                <h5 class="mt-3">Emmanuel Adu Frimpong</h5>
                <small class="text-muted">
                    HND Computer Network Management <br>
                    xxx@gmail.com
                </small>

            </div>
        </div>

        <div class="col mb-4">
            <div class="bg-white rounded border text-center p-4 p-lg-5">

                <img src="{{ asset('img/developers/gadzo.jpg')  }}" class="img-thumbnail rounded-circle" style="width: 7rem">

                <h5 class="mt-3">Patrick Gadzo</h5>
                <small class="text-muted">
                    HND Computer Network Management <br>
                    xxx@gmail.com
                </small>

            </div>
        </div>

    </div>


@endsection