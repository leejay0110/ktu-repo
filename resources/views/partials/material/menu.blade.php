<div class="text-center">
    <i class="fas fa-users fa-3x"></i>
    <h5>Platform Users</h5>
</div>

<hr>


<div class="" id="menu-list">

    @if ($users->count())

    <nav class="nav flex-column">
        @foreach ($users as $user)
            <a class="nav-link px-0 text-dark" href="{{ route('materials.user', $user) }}">{{ $user->name }}</a>
        @endforeach
    </nav>
    
    @else
    
    <p class="alert alert-info mb-0">
        <i class="fas fa-info-circle"></i>
        No user found
    </p>
    
    @endif

</div>