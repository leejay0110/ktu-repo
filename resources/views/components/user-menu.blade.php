<nav class="navbar navbar-dark bg-blue px-4 py-3">

    <span class="navbar-brand">
        <i class="fas fa-user-circle"></i>
        USER DASHBOARD
    </span>

    <button class="btn btn-danger btn-sm" id="menu-close">
        <i class="fas fa-arrow-left"></i>
    </button>

</nav>

<div class="border-bottom bg-light text-center p-4">

    @if ( Auth::user()->avatar )
        <img src="{{ asset('/storage' . Str::after(Auth::user()->avatar, 'public')) }}" alt="avatar" class="img-thumbnail rounded-circle" style="width: 7rem">
    @else
        <img src="{{ asset('img/default.png') }}" alt="avatar" class="img-thumbnail rounded-circle" style="width: 7rem">
    @endif

    <h6 class="mb-0 mt-2">{{ Auth::user()->name }}</h6>
    <small>{{ Auth::user()->username }}</small>

</div>


<div class="p-4">

    <div class="container p-0">
        
        <div class="accordian" id="menu-accordian">
        
            <ul class="list-group list-group-flush">
        
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('user.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
    
    
                @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )
    
                <li class="list-group-item">
                    
                    <a class="" data-toggle="collapse" data-target="#paper-collapse" aria-expanded="true" aria-controls="paper-collapse">
                        <i class="fas fa-sticky-note"></i>
                        Past Examination Papers
                    </a>
        
                    <div id="paper-collapse" class="list-group list-group-flush collapse bg-light" data-parent="#menu-accordian">
                        <a class="list-group-item list-group-item-action" href="{{ route('user.papers') }}">All Papers</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('user.papers.create') }}">Add New Paper</a>
                    </div>
    
                </li>
    
                @endif
    
    
                @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )
    
                <li class="list-group-item">
                    
                    <a class="" data-toggle="collapse" data-target="#material-collapse" aria-expanded="true" aria-controls="material-collapse">
                        <i class="fas fa-book"></i>
                        Course Materials
                    </a>
        
                    <div id="material-collapse" class="list-group list-group-flush collapse bg-light" data-parent="#menu-accordian">
                        <a class="list-group-item list-group-item-action" href="{{ route('user.materials') }}">All Materials</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('user.materials.create') }}">Add New Materials</a>
                    </div>
    
                </li>
    
                @endif
                
    
    
                <li class="list-group-item">
        
                    <a class="" data-toggle="collapse" data-target="#settings-collapse" aria-expanded="true" aria-controls="settings-collapse">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
        
                    <div id="settings-collapse" class="list-group list-group-flush collapse bg-light" data-parent="#menu-accordian">
                        <a class="list-group-item list-group-item-action" href="{{ route('user.settings.details') }}">User Details</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('user.settings.edit-password') }}">Change Password</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('user.settings.edit-avatar') }}">Edit Avatar</a>
                    </div>
        
                </li>
        
            </ul>
        
        </div>
    
    </div>

</div>




{{-- <br><br>

<div class="container p-4">

    <nav class="nav flex-column">
        <a class="nav-link text-dark px-0" href="{{ route('user.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.papers') }}"><i class="fas fa-sticky-note"></i> Past Exam Papers</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.materials') }}"><i class="fas fa-book"></i> Course Materials</a>
        <a class="nav-link text-dark px-0" href="{{ route('user.settings') }}"><i class="fas fa-cog"></i> Settings</a>
    </nav>

</div> --}}
