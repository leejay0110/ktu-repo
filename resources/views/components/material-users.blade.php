<nav class="navbar navbar-dark bg-blue px-4 py-3">

    <span class="navbar-brand">Platform Users</span>

    <button class="btn btn-danger btn-sm" id="menu-close">
        <i class="fas fa-arrow-left"></i>
    </button>

</nav>





<div class="container p-4">

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


