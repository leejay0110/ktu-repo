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


        <aside id="app-menu">
            <x-admin-menu/>
        </aside>



        <section id="app-content" class="px-4 py-5">

            <div class="container p-0 mb-4">

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

            <div class="container p-0 mb-4">
                @yield('content')
            </div>

        </section>

    </div>

    <div id="app-overlay" title="click to close sidebar"></div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')


</body>
</html>
