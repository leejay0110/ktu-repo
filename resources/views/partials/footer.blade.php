<footer id="footer" class="border-top text-muted p-4 bg-light" 
        style="background: url({{ asset('img/footer2.png') }}); background-repeat: no-repeat; background-position: center bottom; background-size: auto">

    <div class="container p-4" style="margin-bottom: 300px !important;">

        <div class="row">


            <div class="col-lg mb-5">
                <h1 class="display-4">{{ env('APP_NAME') }}</h1>
                <p>Copyright &COPY; {{ now()->year }} <br> kturepo.edu.gh</p>
            </div>


            <div class="col-lg mb-5">

                <h5>Site Links</h5>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('homepage') }}">Homepage</a>
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('papers.index') }}">Past Exam Papers</a>
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('materials.index') }}">Course Materials</a>
                
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('about.index') }}">About KTU Repo</a>
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('about.developers') }}">About Developers</a>
                
                    @guest
                        <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('login.show') }}">Sign in</a>
                        <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="{{ route('register') }}">Register</a>
                    @endguest
                </div>

            </div>

            <div class="col-lg">
                    
                <h5>More Links</h5>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="">KTU Student Info Portal</a>
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="">KTU Virtual Learning Environment</a>
                    <a class="list-group-item list-group-item-action bg-light py-2 px-0" href="">KTU Insider</a>
                </div>

            </div>

        </div>
        
    </div>


</footer>