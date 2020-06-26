@extends('layouts.app')


@section('header')

    <div class="jumbotron jumbotron-fluid bg-white border-bottom px-4 px-lg-5 py-5 mb-0">

        <div class="container">

            <h3>Looking for Past Exam Papers?</h3>

            <br>

            <form id="paper-search" action="{{ route('papers.search') }}" method="GET">
        
                @csrf
        
                <div class="form-group">
        
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
    

    <div id="results"></div>


    @if ( $papers->count() )

        <div class="card accordion" id="recentUploadsAccordian" >

            <h6 class="card-header btn bg-blue text-white" data-toggle="collapse" data-target="#recentUploads" aria-expanded="true" aria-controls="recentUploads">
                
                <i class="fas fa-clock"></i>
                Recently Uploaded

            </h6>
    
            <ul class="list-group list-group-flush collapse show" id="recentUploads" data-parent="#recentUploadsAccordian">

                @foreach ($papers as $paper)

                    <li class="list-group-item p-4 p-lg-5">

                        <div class="d-flex">
                            
                            <i class="fas fa-file-pdf fa-3x text-danger mr-4"></i>
                            <div>
                                <h5 class="mb-0">{{ $paper->course_title }}</h5>
                                <small class="text-muted">{{ $paper->course_code }}</small>
                            </div>

                        </div>
                        
                        <hr>

                        <dl class="row mb-4 text-muted">

                            <dt class="col-lg-3">Examiner</dt>
                            <dd class="col-lg-9  mb-0">{{ $paper->examiner }}</dd>

                            <dt class="col-lg-3">Year</dt>
                            <dd class="col-lg-9  mb-0">{{ $paper->year }}</dd>

                            <dt class="col-lg-3">Semester</dt>
                            <dd class="col-lg-9  mb-0">{{ $paper->semester }}</dd>

                            <dt class="col-lg-3">Created</dt>
                            <dd class="col-lg-9  mb-0">
                                <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                    {{ $paper->created_at->diffForHumans() }}
                                </span>
                            </dd>

                        </dl>                    
                        
                        <a href="{{ route('papers.download', $paper) }}" class="btn btn-green">
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