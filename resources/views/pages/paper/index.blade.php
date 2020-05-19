@extends('layouts.app')

@section('content')
    

    <div class="row bg-white rounded-lg mx-auto border p-4 p-lg-5">
    
        <div class="col-lg-5">
            <h3>Looking for <br> Past Exam Papers?</h3>
        </div>

        <div class="col-lg">

            <form id="paper-search" action="{{ route('papers.search') }}" method="GET">
        
                @csrf
        
                <div class="form-group">
        
                    <label for="">Start by typing the course title, course code or examiner name.</label>
                    <div class="input-group">
                        <input list="usersList" type="search" name="query" class="form-control" id="paperSearch" autocomplete="off" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn text-white" style="background-color: orange">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
        
                </div>
        
        
            </form>

        </div>    

    </div>


    <div id="results" class="my-4"></div>


    @if ( $papers->count() )


        <div class="accordian bg-white rounded-lg mx-auto border p-4 p-lg-5" id="recentAccordian">


            <button class="btn btn-link" data-toggle="collapse" data-target="#recentUploads" aria-expanded="true" aria-controls="recentUploads">
                Recently Uploaded
            </button>



            <div id="recentUploads" class="collapse show mt-4" data-parent="#recentAccordian">

                <ul class="list-group list-group-flush">

                    @foreach ($papers as $paper)
    
                        <li class="list-group-item">
    
                            <h6>
                                {{ $paper->course_title }}
                                <span class="text-muted">{{ $paper->course_code }}</span> <br>
                            </h6>
    
                            <dl class="row text-muted mb-4">
    
                                <dt class="col-lg-3">Examiner</dt>
                                <dd class="col-lg-9 mb-0">{{ $paper->examiner }}</dd>
    
                                <dt class="col-lg-3">Year</dt>
                                <dd class="col-lg-9 mb-0">{{ $paper->year }}</dd>
    
                                <dt class="col-lg-3">Semester</dt>
                                <dd class="col-lg-9 mb-0">{{ $paper->semester }}</dd>
    
                                <dt class="col-lg-3">Created</dt>
                                <dd class="col-lg-9 mb-0">
                                    <span title="{{ $paper->created_at->diffForHumans() }}">
                                        {{ $paper->created_at->isoFormat('LLL') }}
                                    </span>
                                </dd>
    
                            </dl>
    
                            <a href="{{ route('papers.download', $paper) }}" class="btn btn-success">
                                Download
                                <i class="fas fa-download"></i>
                            </a>
    
                        </li>
    
                    @endforeach
    
                </ul>
                
            </div>

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