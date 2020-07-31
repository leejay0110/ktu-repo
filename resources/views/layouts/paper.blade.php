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

    
    @yield('header')
    

    <div id="app">



        <section id="app-content" class="px-4 py-5">

            <div class="container p-0">
                @yield('content')
            </div>
            
            
        </section>
        
        <div class="bg-light border-top px-4 py-5">
            
            <div class="container p-0">
                <x-recent-paper/>
            </div>
            
        </div>
        
    </div>
    

    @include('partials.footer')

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')


</body>
</html>
