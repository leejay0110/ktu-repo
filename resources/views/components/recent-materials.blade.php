
@if ( $materials->count() )


    <div class="bg-light px-4 py-5 border-top">
        
        <div class="container p-0">
            
            <h6 class="mb-4">
                <i class="fas fa-clock"></i>
                Recently Uploaded Course Materials
            </h6>

            <ul class="list-group">
            
                @foreach ($materials as $material)
        
                    <li class="list-group-item list-group-item-white p-4">
        
                        <h5 class="mb-0">{{ $material->course_title }}</h5>
                        <small class="text-muted">{{ $material->course_code }}</small>
                        
                        <hr>
        
                        <dl class="row">
        
                            <dt class="col-lg-3">Lecturer</dt>
                            <dd class="col-lg-9">{{ $material->lecturer }}</dd>
        
                            <dt class="col-lg-3">Created</dt>
                            <dd class="col-lg-9">
                                <span title="{{ $material->created_at->diffForHumans() }}">
                                    {{ $material->created_at->isoFormat('LLL') }}.
                                </span>
                            </dd>
        
                            <dt class="col-lg-3">Attached Files</dt>
                            <dd class="col-lg-9">
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

    </div>


@else
    no data
@endif