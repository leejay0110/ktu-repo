<div class="text-center border-bottom bg-light text-blue">

    <div class="container p-4">

        @if ( Auth::user()->avatar )
            <img src="{{ asset('/storage' . Str::after(Auth::user()->avatar, 'public')) }}" alt="avatar" class="img-thumbnail rounded-circle" style="width: 7rem">
        @else
            <img src="{{ asset('img/default.png') }}" alt="avatar" class="img-thumbnail rounded-circle" style="width: 7rem">
        @endif
    
        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
        <small>{{ Auth::user()->username }}</small>

    </div>

</div>


<div class="container p-4">

    <nav class="nav flex-column">
        <a class="nav-link text-dark px-0" href="{{ route('user.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.papers') }}"><i class="fas fa-sticky-note"></i> Past Exam Papers</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.materials') }}"><i class="fas fa-book"></i> Course Materials</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.settings') }}"><i class="fas fa-cog"></i> Settings</a>
    </nav>

</div>
