@extends('layouts.app')

@section('content')
    


    <h1 class="display-4 text-center mb-5">Past Exam Papers</h1>


    <h3>Looking for past exam papers?</h3>
    <p>Start by typing the course title, course code or examiner name of the examination paper</p>



    <form id="paper-search" action="{{ route('papers.search') }}" method="GET">

        @csrf

        <div class="form-group">

            <div class="input-group">
                <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
                <div class="input-group-append">
                    <button type="submit" class="btn text-white" style="background-color: #ED4917">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

        </div>


    </form>

    <div id="results" class="mt-5"></div>


@endsection

@section('scripts')
    
    <script>

        $('#paper-search').submit(function(e) {
                
            e.preventDefault();
            var url = $(this).attr("action")
            var form = $(this);

            $.ajax({
                type: "get",
                url: url,
                data: form.serialize(),
                success: function(data)
                {
                    $("#results").html(data);
                }
            })

        });

    </script>

@endsection