@extends('layouts.material')






@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection


@section('header')
    
    <div class="mt-5">

        <div class="container p-0">

            <h4>Looking for Course Materials?</h4>

            <form id="material-search" action="{{ route('materials.search') }}" method="get">

                @csrf
        
                <div class="form-group mb-0">

                    <label>
                        Start by typing the <em>course title</em>, <em>course code</em> or <em>lecturer name</em>.
                    </label>
                    <div class="input-group">
                        <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection



@section('search-results')

    <div class="bg-white px-4 py-5">

        <div class="container p-0">
            
            <div id="material-results">
                <div
                    class="text-center d-flex align-items-center justify-content-center"
                    style="min-height: 25vh; opacity: 0.5;"
                >
                    <img src="{{ asset('img/material.jpg') }}" class="rounded-circle">
                </div>
            </div>

        </div>

    </div>


@endsection




@section('recent-materials')

    <x-recent-materials/>
    
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