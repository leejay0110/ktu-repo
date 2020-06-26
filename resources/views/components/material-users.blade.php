<div class="border-bottom bg-light text-blue">
    
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

</div>