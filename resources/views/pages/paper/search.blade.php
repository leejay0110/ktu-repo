<div class="text-center mb-5">

    <h5>
        <i class="fas fa-search"></i>
        Search Results
    </h5>

</div>


@if ($papers->count())

    <div class="row row-cols-1 row-cols-lg-2">

        @foreach ($papers as $paper)

            <div class="col mb-4">

                <div class="card" style="background-color: #F0F2F8 !important;">
                    
                    <div class="card-header">
                        <i class="fas fa-file-pdf"></i>
                        {{ $paper->course_title }} &Tilde; {{ $paper->course_code }}
                    </div>

                    <div class="card-body">

                        <dl class="row mb-3">

                            <dt class="col-3">Examiner</dt>
                            <dd class="col-9  mb-0">{{ $paper->examiner }}</dd>

                            <dt class="col-3">Year</dt>
                            <dd class="col-9  mb-0">{{ $paper->year }}</dd>

                            <dt class="col-3">Semester</dt>
                            <dd class="col-9  mb-0">{{ $paper->semester }}</dd>

                            <dt class="col-3">Created</dt>
                            <dd class="col-9  mb-0">
                                <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                    {{ $paper->created_at->diffForHumans() }}
                                </span>
                            </dd>

                        </dl>

                        <a href="" class="btn btn-success btn-sm">
                            <i class="fas fa-download"></i> download
                        </a>
                            
    
                    </div>

                </div>

            </div>

        @endforeach

    </div>

    {{-- <div class="table-responsive">

        <table class="table table-borderless table-striped table-hover">

            <thead>
                <tr>
                    <th>Course Title &Tilde; Course Code</th>
                    <th>Examiner Name</th>
                    <th>Year &Tilde; Semester</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($papers as $paper)
                
                    <tr>
                        <td>{{ $paper->course_title }} &Tilde; {{ $paper->course_code }}</td>
                        <td>{{ $paper->examiner }}</td>
                        <td>{{ $paper->year }} &Tilde; {{ $paper->semester }}</td>
                        <td>
                            <span title="{{ $paper->created_at->isoFormat('LLL') }}">
                                {{ $paper->created_at->diffForHumans() }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('papers.download', $paper) }}" target="_blank">
                                <i class="fas fa-download"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </div>

    </div> --}}

@else

    <p class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        No data found.
    </p>

@endif