<nav class="navbar navbar-dark bg-blue px-4 py-3">

    <span class="navbar-brand">

        <i class="fas fa-shield-alt"></i>
        ADMIN DASHBOARD

    </span>

    <button class="btn btn-danger btn-sm" id="menu-close">
        <i class="fas fa-arrow-left"></i>
    </button>

</nav>

<div class="text-center bg-light border-bottom p-4">
    
    <i class="fas fa-shield-alt fa-3x text-blue"></i>

    <h5 class="mb-0 mt-2">{{ Auth::user()->name }}</h5>
    <small>{{ Auth::user()->username }}</small>

</div>


<div class="p-4">

    <div class="container p-0">
    
    
        <div class="accordian" id="menu-accordian">
    
            <ul class="list-group list-group-flush rounded">
    
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
                </li>
                <li class="list-group-item">
                    <a class="text-dark" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
                </li>
                <li class="list-group-item">
    
                    
                    <a class="" data-toggle="collapse" data-target="#settings-collapse" aria-expanded="true" aria-controls="settings-collapse">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
    
                    <div id="settings-collapse" class="list-group list-group-flush collapse bg-light" data-parent="#menu-accordian">
                        <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.details') }}">User Details</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.edit-password') }}">Change Password</a>
                    </div>
    
                </li>
    
            </ul>
    
        </div>
    
    </div>

</div>


