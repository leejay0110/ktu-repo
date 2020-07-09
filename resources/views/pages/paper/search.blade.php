<div class="mb-4">

    <h5 class="mb-4">
        Search Results
        <span class="badge badge-pill badge-dark">
            {{ $papers->count() }}
        </span>
    </h5>

    @if ($papers->count())

        <div class="row row-cols-1 row-cols-lg-2">

            @foreach ($papers as $paper)

                <div class="col mb-4">

                    <div class="bg-white rounded border shadow-sm p-4">

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
                        
                        <a href="{{ route('papers.download', $paper) }}" class="btn btn-block btn-green">
                            Download
                            <i class="fas fa-download"></i>
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            No data found.
        </div>

    @endif

</div>