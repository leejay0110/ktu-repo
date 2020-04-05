@extends('layouts.app')


@section('content')
    
    <h1 class="display-4 text-center mb-5">About The Developers</h1>

    

    <ul class="list-group list-group-flush mt-5">

        <li class="list-group-item">
            <div class="d-flex align-items-center">

                <img src="{{ asset('img/developers/lee.jpg')  }}" class="img-thumbnail rounded-circle mr-5">
                <dl class="row flex-fill">
                    <dt class="col-lg-3">Name</dt>
                    <dd class="col-lg-9">John Lee</dd>

                    <dt class="col-lg-3">Programme</dt>
                    <dd class="col-lg-9">HND Computer Network Management</dd>

                    <dt class="col-lg-3">Email Address</dt>
                    <dd class="col-lg-9">leejay0110@gmail.com</dd>
                </dl>

            </div>
        </li>

        <li class="list-group-item">
            <div class="d-flex align-items-center">

                <img src="{{ asset('img/developers/thompson.jpg')  }}" class="img-thumbnail rounded-circle mr-5">
                <dl class="row flex-fill">
                    <dt class="col-lg-3">Name</dt>
                    <dd class="col-lg-9">Isaac Thompson</dd>

                    <dt class="col-lg-3">Programme</dt>
                    <dd class="col-lg-9">HND Computer Science</dd>
                </dl>

            </div>  
        </li>

        <li class="list-group-item">
            <div class="d-flex align-items-center">

                <img src="{{ asset('img/developers/frimpong.jpg')  }}" class="img-thumbnail rounded-circle mr-5">
                <dl class="row flex-fill">
                    <dt class="col-lg-3">Name</dt>
                    <dd class="col-lg-9">Emmanuel Adu Frimpong</dd>

                    <dt class="col-lg-3">Programme</dt>
                    <dd class="col-lg-9">HND Computer Network Management</dd>
                </dl>

            </div>
        </li>

        <li class="list-group-item">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/developers/gadzo.jpg')  }}" class="img-thumbnail rounded-circle mr-5">
                <dl class="row flex-fill">
                    <dt class="col-lg-3">Name</dt>
                    <dd class="col-lg-9">Patrick Gadzo</dd>

                    <dt class="col-lg-3">Programme</dt>
                    <dd class="col-lg-9">HND Computer Network Management</dd>
                </dl>
            </div>
        </li>


    </ul>



@endsection