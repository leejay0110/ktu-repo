<div class="text-center mb-5">

    <h5>
        <i class="fas fa-search"></i>
        Search Results
    </h5>

</div>


@if ($materials->count())


    <div class="table-responsive">

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
                        {{-- <td>{{ $paper->year }} &Tilde; {{ $paper->semester }}</td>
                        <td>
                            <a href="{{ route('papers.download', $paper) }}" target="_blank">
                                <i class="fas fa-download"></i>
                            </a>
                        </td> --}}
                    </tr>

                @endforeach

            </tbody>

        </div>

    </div>

@else

    <p class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        No data found.
    </p>

@endif
