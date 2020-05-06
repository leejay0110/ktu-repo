<footer id="footer" class="border-top" style="background-color: #e2e8f0">

    <div class="container px-4 py-5">

        <div class="row">


            <div class="col-lg mb-4 mb-lg-0">
                <h3>{{ env('APP_NAME') }}</h3>
                <p>Copyright &COPY; {{ now()->year }} <br> kturepo.edu.gh</p>
            </div>


            <div class="col-lg mb-4 mb-lg-0">

                <h5 class="mb-3">Site Links</h5>
                <div>
                    <a class="d-block my-2" href="{{ route('homepage') }}">Homepage</a>
                    <a class="d-block my-2" href="{{ route('papers.index') }}">Past Exam Papers</a>
                    <a class="d-block my-2" href="{{ route('materials.index') }}">Course Materials</a>
                    <a class="d-block my-2" href="{{ route('about') }}">About KTU Repo</a>
                
                    @guest
                        <a class="d-block my-2" href="{{ route('login.show') }}">Sign in</a>
                        <a class="d-block my-2" href="{{ route('register') }}">Register</a>
                    @endguest
                </div>

            </div>

            <div class="col-lg">
                    
                <h5 class="mb-3">More Links</h5>
                <div>
                    <a class="d-block my-2" href="">KTU Student Info Portal</a>
                    <a class="d-block my-2" href="">KTU Virtual Learning Environment</a>
                    <a class="d-block my-2" href="">KTU Insider</a>
                </div>

            </div>

        </div>
        
    </div>


</footer>