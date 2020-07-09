@extends('layouts.material')






@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection


@section('content')

    <div class="bg-white rounded border shadow-sm p-4">

        <h4>Looking for Course Materials?</h4>

        <form id="material-search" action="{{ route('materials.search') }}" method="get">

            @csrf
    
            <div class="form-group mb-0">

                <label>
                    Start by typing the <strong>course title</strong>, <strong>course code</strong> or <strong>lecturer name</strong>.
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

    <div id="material-results"></div>

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