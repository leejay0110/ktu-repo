<div class="mb-4">

    <h6 class="mb-4 text-success text-uppercase">
        Search Results
        <span class="badge badge-pill badge-success">
            {{ $materials->count() }}
        </span>
    </h6>


    @if ($materials->count())


        <ul class="list-group">
            
            @foreach ($materials as $material)
    
                <li class="list-group-item list-group-item-light p-4">
    
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

        {{-- <div class="row row-cols-1 row-cols-lg-2">

            @foreach ($materials as $material)

                <div class="col mb-4">

                    <div class="bg-white rounded border shadow-sm p-4">
                        
                        <h5 class="mb-0">{{ $material->course_title }}</h5>
                        <small class="text-muted">{{ $material->course_code }}</small>
                        
                        <hr>

                        <dl class="row text-muted mb-4">

                            <dt class="col-lg-3">Lecturer</dt>
                            <dd class="col-lg-9  mb-0">{{ $material->lecturer }}</dd>


                            <dt class="col-lg-3">Created</dt>
                            <dd class="col-lg-9  mb-0">
                                <span title="{{ $material->created_at->isoFormat('LLL') }}">
                                    {{ $material->created_at->diffForHumans() }}
                                </span>
                            </dd>


                            <dt class="col-lg-3">Files</dt>
                            <dd class="col-lg-9  mb-0">
                                <span class="badge badge-pill badge-dark">{{ $material->files->count() }}</span>
                            </dd>


                        </dl>                    
                        
                        <a href="{{ route('materials.show', $material) }}" class="btn btn-blue">
                            View
                            <i class="fas fa-eye"></i>
                        </a>

                    </div>

                </div>

            @endforeach

        </div> --}}

    @else

        <p class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            No data found.
        </p>

    @endif

</div>