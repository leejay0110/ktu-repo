@extends('layouts.paper')



@section('header')
    

    <div class="bg-light border-bottom px-4 py-5">

        <div class="container p-0 py-4">

            <h4>Looking for Past Examination Papers?</h4>
    
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


    </div>


@endsection


@section('content')
    
    <div id="results">

        <div
            class="text-center d-flex align-items-center justify-content-center"
            style="min-height: 25vh; opacity: 0.5;"
        >
            <img src="{{ asset('img/paper.jpg') }}" class="rounded-circle">
        </div>

    </div>

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