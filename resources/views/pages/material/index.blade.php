@extends('layouts.material')






@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection


@section('content')


    <div class="row bg-white rounded-lg border mx-auto p-4 p-lg-5">

        <div class="col-lg-5">
            <h3>Looking for <br> Course Materials?</h3>
        </div>

        <div class="col-lg">

            <form id="material-search" action="{{ route('materials.search') }}" method="get">
        
                @csrf
          
                <div class="form-group">

                    <label>Start by typing the course title, course code or lecturer name.</label>
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
    

    <div id="material-results" class="my-4"></div>

    @if ( $materials->count() )


        <div class="accordian bg-white rounded-lg mx-auto border p-4 p-lg-5" id="recentAccordian">


            <button class="btn btn-link" data-toggle="collapse" data-target="#recentUploads" aria-expanded="true" aria-controls="recentUploads">
                Recently Uploaded
            </button>



            <div id="recentUploads" class="collapse show mt-4" data-parent="#recentAccordian">

                <ul class="list-group list-group-flush">
        
                    @foreach ($materials as $material)
        
                        <li class="list-group-item">
        
                            <h6>
                                {{ $material->course_title }}
                                <span class="text-muted">{{ $material->course_code }}</span>
                            </h6>
        
                            <dl class="row text-muted mb-4">
        
                                <dt class="col-lg-3">Lecturer</dt>
                                <dd class="col-lg-9 mb-0">{{ $material->lecturer }}</dd>
        
                                <dt class="col-lg-3">Attached Files</dt>
                                <dd class="col-lg-9 mb-0">
                                    <span class="badge badge-pill badge-dark">
                                        {{ $material->files->count() }}
                                    </span>
                                </dd>
        
                                <dt class="col-lg-3">Created</dt>
                                <dd class="col-lg-9 mb-0">
                                    <span title="{{ $material->created_at->diffForHumans() }}">
                                        {{ $material->created_at->isoFormat('LLL') }}.
                                    </span>
                                </dd>
        
                            </dl>
        
                            <a href="{{ route('materials.show', $material) }}" class="btn btn-primary">
                                View
                                <i class="fas fa-eye"></i>
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