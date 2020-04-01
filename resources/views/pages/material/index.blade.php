@extends('layouts.material')






@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection


@section('content')
    
    <h1 class="display-4 text-center mb-5">Course Materials</h1>

    
    <h4>Looking for Course Materials?</h4>
    <p>Start by typing the course title, course code or lecturer name.</p>
    <form id="material-search" action="{{ route('materials.search') }}" method="get">

        @csrf
  
        <div class="input-group">
            <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
            <div class="input-group-append">
                <button type="submit" class="btn text-white" style="background-color: #ED4917">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>


    </form>

    <div id="material-results" class="mt-5"></div>


@endsection


@section('scripts')
    
    <script>

        $('#material-search').submit(function(e) {
                
            e.preventDefault();
            var url = $(this).attr("action")
            var form = $(this);

            $.ajax({
                type: "get",
                url: url,
                data: form.serialize(),
                success: function(data)
                {
                    $("#material-results").html(data);
                }
            })

        });

    </script>

@endsection