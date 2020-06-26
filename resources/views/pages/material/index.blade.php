@extends('layouts.material')






@section('nav')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Course Materials</li>
        </ol>
    </nav>

@endsection


@section('header')

    <div class="mt-4">

        <h3>Looking for Course Materials?</h3>

        <br>

        <form id="material-search" action="{{ route('materials.search') }}" method="get">

            @csrf
    
            <div class="form-group">

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

@endsection


@section('content')

    <div id="material-results"></div>

    @if ( $materials->count() )

        <div class="card accordion" id="recentUploadsAccordian" >

            <h6 class="card-header btn bg-blue text-white" data-toggle="collapse" data-target="#recentUploads" aria-expanded="true" aria-controls="recentUploads">
                
                <i class="fas fa-clock"></i>
                Recently Uploaded

            </h6>

            <ul class="list-group list-group-flush collapse show" id="recentUploads" data-parent="#recentUploadsAccordian">

                @foreach ($materials as $material)
        
                    <li class="list-group-item p-4 p-lg-5">
    
                        <h5 class="mb-0">{{ $material->course_title }}</h5>
                        <small class="text-muted">{{ $material->course_code }}</small>
                        
                        <hr>
    
                        <dl class="row text-muted mb-4">
    
                            <dt class="col-lg-3">Lecturer</dt>
                            <dd class="col-lg-9 mb-0">{{ $material->lecturer }}</dd>
    
                            <dt class="col-lg-3">Created</dt>
                            <dd class="col-lg-9 mb-0">
                                <span title="{{ $material->created_at->diffForHumans() }}">
                                    {{ $material->created_at->isoFormat('LLL') }}.
                                </span>
                            </dd>

                            <dt class="col-lg-3">Attached Files</dt>
                            <dd class="col-lg-9 mb-0">
                                <span class="badge badge-pill badge-dark">
                                    {{ $material->files->count() }}
                                </span>
                            </dd>
    
                        </dl>
    
                        <a href="{{ route('materials.show', $material) }}" class="btn btn-blue">
                            View
                            <i class="fas fa-eye"></i>
                        </a>
    
                    </li>
    
                @endforeach

            </ul>

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