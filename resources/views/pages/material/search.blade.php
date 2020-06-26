<div class="mb-5">

    <h5 class="mb-4">
        Search Results
        <span class="badge badge-pill badge-dark">
            <i class="fas fa-search"></i>
            {{ $materials->count() }}
        </span>
    </h5>


    @if ($materials->count())

        <div class="row row-cols-1 row-cols-lg-2">

            @foreach ($materials as $material)

                <div class="col mb-4">

                    <div class="bg-white rounded border p-4 p-lg-5">
                        
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

        </div>

    @else

        <p class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            No data found.
        </p>

    @endif

</div>