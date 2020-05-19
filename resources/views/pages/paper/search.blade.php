<h5 class="text-muted mb-4">

    Search Results
    <span class="badge badge-pill badge-secondary">
        <i class="fas fa-search"></i>
        {{ $papers->count() }}
    </span>

</h5>


@if ($papers->count())

    <div class="row row-cols-1 row-cols-lg-2">

        @foreach ($papers as $paper)

            <div class="col mb-4">

                <div class="bg-white rounded-lg border p-4 p-lg-5">
                    
                    <h5 class="mb-0">{{ $paper->course_title }}</h5>
                    <small class="text-muted">{{ $paper->course_code }}</small>
                    
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
                    
                    <a href="{{ route('papers.download', $paper) }}" class="btn btn-success">
                        Download
                        <i class="fas fa-download"></i>
                    </a>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="bg-white rounded-lg mx-auto border p-4 p-lg-5 text-info">
        <i class="fas fa-info-circle"></i>
        No data found.
    </div>

@endif