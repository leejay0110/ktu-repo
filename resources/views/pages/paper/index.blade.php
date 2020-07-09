@extends('layouts.paper')


@section('content')
    
    <div class="bg-white rounded border shadow-sm p-4">

        <h4>Looking for Past Exam Papers?</h4>

        <form id="paper-search" action="{{ route('papers.search') }}" method="GET">
            
            @csrf

            <div class="form-group mb-0">

                <label for="">
                    Start by typing the <strong>course title</strong>, <strong>course code</strong> or <strong>examiner name</strong>.
                </label>
                <div class="input-group">
                    <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-blue">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>


        </form>

    </div>

    <br>

    <div id="results"></div>

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