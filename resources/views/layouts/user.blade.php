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
            <div class="container p-4">
                <x-user-menu/>
            </div>
        </section>



        <section id="app-content">

            <div class="container p-4">

                <div class="d-flex">

                    <div class="mr-4">
                        <button class="btn bg-blue text-white" id="menu-toggle" style="padding: 11px 16px; font-size: 1rem">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <div class="flex-fill">
                        @yield('nav')
                    </div>

                </div>

            </div>

            <div class="container p-4">
                @yield('content')
            </div>

        </section>


    </div>


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')


</body>
</html>
