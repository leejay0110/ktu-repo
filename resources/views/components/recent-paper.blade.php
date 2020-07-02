<div class="container p-4">


    <div class="card">

        <div class="card-header">            
            <i class="fas fa-clock"></i>
            Recently Uploaded
        </div>
    
        @if ( $papers->count() )

            <div class="card-body p-0">
                
                <ul class="list-group list-group-flush">
        
                    @foreach ($papers as $paper)
        
                        <li class="list-group-item p-4">                    
                            
                            <h6 class="mb-0">{{ $paper->course_title }}</h6>
                            <small class="text-muted">{{ $paper->course_code }}</small>
                            
                            <hr>
        
                            <dl>
        
                                <dt>Examiner</dt>
                                <dd>{{ $paper->examiner }}</dd>
        
                                <dt>Year - Semester</dt>
                                <dd>{{ $paper->year }} - {{ $paper->semester }}</dd>
        
                                <dt>Created</dt>
                                <dd>
                                    <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                        {{ $paper->created_at->diffForHumans() }}
                                    </span>
                                </dd>
        
                            </dl>                    
                            
                            <a href="{{ route('papers.download', $paper) }}" class="btn btn-block btn-green">
                                Download
                                <i class="fas fa-download"></i>
                            </a>
        
                        </li>
        
                    @endforeach
        
                </ul>

            </div>
        
    
        @else

            <div class="card-body">

                No data found

            </div>
    
    
        @endif

    </div>

</div>