@extends('layouts.app')

@section('content')
    




    <div class="row bg-white rounded-lg mx-auto shadow-sm p-4 p-lg-5">
    
        <div class="col-lg-5">
            <h3 class="font-weight-bold">Looking for <br> Past Exam Papers?</h3>
            {{-- <p>Start by typing the course title, course code or examiner name of the examination paper</p> --}}
        </div>

        <div class="col-lg">

            <form id="paper-search" action="{{ route('papers.search') }}" method="GET">
        
                @csrf
        
                <div class="form-group">
        
                    <label for="">Start by typing the course title, course code or examiner name.</label>
                    <div class="input-group">
                        <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
        
                </div>
        
        
            </form>

        </div>


    
    
    

    </div>


    <div id="results" class="my-5"></div>


    @if ( $papers->count() )
    
        <div class="bg-white rounded-lg mx-auto shadow-sm p-4 p-lg-5">

            <h5>Recently Uploaded</h5>

            <hr>

            <ul class="list-group list-group-flush">

                @foreach ($papers as $paper)

                    <li class="list-group-item">

                        <p>
                            {{ $paper->course_title }}  <br>
                            <span class="text-muted">{{ $paper->course_code }}</span> <br>
                            <small class="text-muted">By {{ $paper->examiner }}, {{ $paper->created_at->diffForHumans() }}</small>
                        </p>

                        <a href="{{ route('papers.download', $paper) }}" class="d-block">
                            Download
                            <i class="fas fa-download"></i>
                        </a>

                    </li>

                @endforeach

            </ul>

        </div>


    @endif


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