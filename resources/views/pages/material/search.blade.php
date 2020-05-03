<h5 class="font-weight-bold text-muted mb-5">
    Search Results
    <i class="fas fa-search"></i>
</h5>


@if ($materials->count())


    {{-- <div class="table-responsive">

        <table class="table table-borderless table-striped table-hover">

            <thead>
                <tr>
                    <th>Course Title &Tilde; Course Code</th>
                    <th>Lecturer</th>
                    <th>Created</th>
                    <th>Files</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($materials as $material)
                
                    <tr>
                        <td>{{ $material->course_title }} &Tilde; {{ $material->course_code }}</td>
                        <td>{{ $material->lecturer }}</td>
                        <td>
                            <span title="{{ $material->created_at->isoFormat('LLL') }}">
                                {{ $material->created_at->diffForHumans() }}
                            </span>
                        </td>
                        <td><span class="badge badge-pill badge-dark">{{ $material->files->count() }}</span></td>
                        <td>
                            <a href="{{ route('materials.show', $material) }}">
                                <i class="fas fa-eye fa-lg"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </div>

    </div> --}}

    <div class="row row-cols-1 row-cols-lg-2">

        @foreach ($materials as $material)

            <div class="col mb-4">

                <div class="bg-white rounded-lg shadow-sm p-4 p-lg-5">
                    
                    <h5 class="mb-0">{{ $material->course_title }}</h5>
                    <small class="text-muted">{{ $material->course_code }}</small>
                    
                    <hr>

                    <dl class="row mb-4 text-muted">

                        <dt class="col-lg-3">Lecturer</dt>
                        <dd class="col-lg-9  mb-0">{{ $material->lecturer }}</dd>

                        {{-- <dt class="col-lg-3">Posted at</dt>
                        <dd class="col-lg-9  mb-0">{{ $material->created_at }}</dd> --}}

                        <dt class="col-lg-3">Attached Files</dt>
                        <dd class="col-lg-9  mb-0">
                            <span class="badge badge-pill badge-dark">{{ $material->files->count() }}</span>
                        </dd>

                        <dt class="col-lg-3">Created</dt>
                        <dd class="col-lg-9  mb-0">
                            <span title="{{ $material->created_at->isoFormat('LLL') }}">
                                {{ $material->created_at->diffForHumans() }}
                            </span>
                        </dd>

                    </dl>                    
                    
                    <a href="{{ route('materials.show', $material) }}">
                        <i class="fas fa-eye fa-lg"></i>
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
