{{-- <div class="border-bottom bg-light text-blue">
    
    <div class="container p-4">

        <i class="fas fa-users fa-3x d-block text-center"></i>
    
        <br>
    
        <h6>Platfom Users</h6>
    
        <p class="mb-0">
            Browse through course materials by selecting a user.
        </p>

    </div>
</div>

<div class="container p-4">

    <div id="menu-list">

        @if ($users->count())

        <nav class="nav flex-column">
            @foreach ($users as $user)
                <a class="nav-link px-0 py-1 text-dark" href="{{ route('materials.user', $user) }}">{{ $user->name }}</a>
            @endforeach
        </nav>
        
        @else
        
        <p class="alert alert-info mb-0">
            <i class="fas fa-info-circle"></i>
            No user found
        </p>
        
        @endif

    </div>

</div> --}}






<div class="container p-4">

    
    <div class="accrordian border rounded" id="menu-accordian">
    

        <div class="">

            <a class="d-block p-3 bg-gray" data-toggle="collapse" data-target="#users-collapse" aria-expanded="true" aria-controls="users-collapse">
                <i class="fas fa-users"></i>
                Platform Users
            </a>
                            
            <div id="users-collapse" class="collapse show border-top""  data-parent="#menu-accordian">
                    
                @if ($users->count())

                    <div class="list-group list-group-flush"  id="menu-list">
                        @foreach ($users as $user)
                            <a class="list-group-item list-group-item-action" href="{{ route('materials.user', $user) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                
                @else
                
                    <p class="alert alert-info mb-0">
                        <i class="fas fa-info-circle"></i>
                        No user found
                    </p>
                
                @endif

            </div>

        </div>



        <div class="border-top">

            <a class="d-block p-3 bg-gray" data-toggle="collapse" data-target="#recent-materials-collapse" aria-expanded="true" aria-controls="recent-materials-collapse">
                <i class="fas fa-clock"></i>
                Recently Uploaded
            </a>

            <div id="recent-materials-collapse" class="collapse border-top" data-parent="#menu-accordian">

                @if ( $materials->count() )
    
                    <ul class="list-group list-group-flush">
                    
                        @foreach ($materials as $material)
    
                            <li class="list-group-item p-4">
            
                                <h5 class="mb-0">{{ $material->course_title }}</h5>
                                <small class="text-muted">{{ $material->course_code }}</small>
                                
                                <hr>
            
                                <dl class="text-muted">
            
                                    <dt>Lecturer</dt>
                                    <dd>{{ $material->lecturer }}</dd>
            
                                    <dt>Created</dt>
                                    <dd>
                                        <span title="{{ $material->created_at->diffForHumans() }}">
                                            {{ $material->created_at->isoFormat('LLL') }}.
                                        </span>
                                    </dd>
            
                                    <dt>Attached Files</dt>
                                    <dd>
                                        <span class="badge badge-pill badge-dark">
                                            {{ $material->files->count() }}
                                        </span>
                                    </dd>
            
                                </dl>
            
                                <a href="{{ route('materials.show', $material) }}" class="btn btn-block btn-blue">
                                    View
                                    <i class="fas fa-eye"></i>
                                </a>
            
                            </li>
            
                        @endforeach
                    
                    </ul>
    
                @else
                    no data
                @endif

            </div>

        </div>

    
    </div>

</div>


