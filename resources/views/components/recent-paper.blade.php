<h6 class="mb-4">
    <i class="fas fa-clock"></i>
    Recently Uploaded Past Examination Papers
</h6>

    
@if ( $papers->count() )

    <ul class="list-group">

        @foreach ($papers as $paper)

            <li class="list-group-item list-group-item-white p-4">                    
                
                <div class="d-flex">
                        
                    <i class="fas fa-file-pdf fa-3x text-red mr-4"></i>
                    <div>
                        <h5 class="mb-0">{{ $paper->course_title }}</h5>
                        <small class="text-muted">{{ $paper->course_code }}</small>
                    </div>

                </div>
                
                <hr>

                <dl class="row">

                    <dt class="col-lg-3">Examiner</dt>
                    <dd class="col-lg-9">{{ $paper->examiner }}</dd>

                    <dt class="col-lg-3">Year - Semester</dt>
                    <dd class="col-lg-9">{{ $paper->year }} - {{ $paper->semester }}</dd>

                    <dt class="col-lg-3">Created</dt>
                    <dd class="col-lg-9">
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

@else

    <p class="alert alert-info">No data found</p>

@endif