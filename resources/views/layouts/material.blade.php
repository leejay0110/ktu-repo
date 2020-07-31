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
    

    <div id="app" class="">


        <section id="app-menu">
            <x-material-users/>
        </section>



        <section id="app-content">



            <div class="bg-light border-bottom px-4">

                <div class="container px-0 py-4">
    
                    <div class="d-flex">
    
                        <div class="mr-4">
                            <button class="btn bg-blue text-white" id="menu-toggle" style="padding: 11px 16px; font-size: 1rem">
                                <i class="fas fa-align-left"></i>
                            </button>
                        </div>
    
                        <div class="flex-fill">
                            @yield('nav')
                        </div>
    
                    </div>
    
                </div>

                @yield('header')

                
            </div>




            @yield('content')

            @yield('search-results')

            @yield('recent-materials')
            
        </section>
        

    </div>


    <div id="app-overlay"></div>


    @include('partials.footer')

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')


</body>
</html>
