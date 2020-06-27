<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KTUCM</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('style')
    
</head>
<body>

    
    
    @include('partials.navbar')
    @include('partials.errors')
    

    <div id="app">


        <section id="app-menu">
            <x-recent-paper/>
        </section>



        <section id="app-content">


            <div class="jumbotron jumbotron-fluid border-bottom bg-white p-4 mb-0">

                <div class="container">
    
                    <div class="d-flex mb-4">
    
                        <div class="mr-4">
                            <button class="btn bg-blue text-white" id="menu-toggle" style="padding: 11px 16px; font-size: 1rem">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
    
                        <div class="flex-fill">
                            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Past Examination Papers</li>
                                </ol>
                            </nav>

                        </div>
    
                    </div>
    
                    @yield('header')

                </div>

            </div>


            <div class="container p-4">
                @yield('content')
            </div>

        </section>


    </div>

    @include('partials.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')


</body>
</html>
